<?php

namespace App\Http\Controllers;

use App\Models\NonRKATModel;
use App\Models\NonRKATValidasiModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NonRKATController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($params)
    {
        return Response()->json([
            'data' => NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                ->where('nonrkat.id_user', $params)
                ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                ->orderBy('nonrkat.id_nonrkat', 'DESC')
                ->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $params
     * @return \Illuminate\Http\Response
     */
    public function show($params)
    {
        $data = NonRKATModel::find($params);
        $status = $this->status($data->id_nonrkat);
        $history = $this->history($data->id_nonrkat);
        return response()->json([
            'data' => $data,
            'status' => $status->original['data'],
            'history' => $history->original['data']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "id_user" => "required",
            "nama_kegiatan" => "required",
            "tujuan" => "required",
            "latar_belakang" => "required",
            "sasaran" => "required",
            "target_capaian" => "required",
            "bentuk_pelaksanaan_program" => "required",
            "tempat_program" => "required",
            "tanggal" => "required",
            "bidang_terkait" => "required",
            "id_iku_parent" => "required",
            "id_iku_child1" => "required",
            "id_iku_child2" => "required",
            "biaya_program" => "required",
            "bank" => "required",
            "atn" => "required",
            "no_rek" => "required|numeric",
            "rab" => "required",
            "status_pengajuan" => "required"
        ]);

        $data = NonRKATModel::create($request->all());
        $this->NonRKATValidasiModel($data->id_nonrkat, $request->id_user, $request->validasi_status, $request->nama_status, $request->message);
        $this->sendMail($data->id_nonrkat, $request->validasi_status, $request->nama_status);
        return response()->json([
            'data' => $data
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $params
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $params)
    {
        $data = NonRKATModel::find($params)->update($request->all());

        $this->NonRKATValidasiModel($params, $request->id_user, $request->validasi_status, $request->nama_status, $request->message);
        $this->sendMail($params, $request->validasi_status, $request->nama_status);

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $params by user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $data = NonRKATModel::get();
        $data ? $data->each->delete() : false;
        return response()->json([
            'data' => $data
        ]);
    }

    public function deleteByUser($params)
    {
        $data = NonRKATModel::where('id_user', $params);
        $data ? $data->delete() : false;

        return response()->json([
            $data
        ]);
    }

    public function delete(Request $request)
    {
        if (count($request->all()) == 1) {
            $data = NonRKATModel::where('id_nonrkat', $request->all());
            $data ? $data->delete() : false;
        } else {
            $data = NonRKATModel::whereIn('id_nonrkat', $request->all());
            $data ? $data->delete() : false;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Subdivisi
     */
    public function subDivisi($params)
    {
        $userStruktur = UserModel::join('struktur', 'user.id_struktur', 'struktur.id_struktur')
            ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
            ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
            ->where('id_user', $params)
            ->first();

        if ($userStruktur->level == 1) {
            $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                ->where('user.id_user', '!=', $userStruktur->id_user)
                ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                ->orderBy('nonrkat.id_nonrkat', 'DESC')
                ->get();
        } else if ($userStruktur->level == 2) {
            $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                ->where('user.id_user', '!=', $userStruktur->id_user)
                ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                ->orderBy('nonrkat.id_nonrkat', 'DESC')
                ->get();
        } else if ($userStruktur->level == 3 || $userStruktur->level == 4) {
            if ($userStruktur->child1_level == "1" || $userStruktur->level == 3) {
                $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                    ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                    ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                    ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                    ->where('user.id_user', '!=', $userStruktur->id_user)
                    ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                    ->orderBy('nonrkat.id_nonrkat', 'DESC')
                    ->get();
            } else {
                $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                    ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                    ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                    ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                    ->where('user.id_user', '!=', $userStruktur->id_user)
                    ->where('struktur.id_struktur', $userStruktur->id_struktur)
                    ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                    ->orderBy('nonrkat.id_nonrkat', 'DESC')
                    ->get();
            }
        } else if ($userStruktur->level == 5) {
            $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                ->where('user.id_user', '!=', $userStruktur->id_user)
                ->where('struktur.id_struktur', $userStruktur->id_struktur)
                ->where('struktur_child1.id_struktur_child1', $userStruktur->id_struktur_child1)
                ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                ->orderBy('nonrkat.id_nonrkat', 'DESC')
                ->get();
        }

        return response()->json([
            "data" => $data
        ]);
    }

    public function subDivisiNeed($params)
    {
        $userStruktur = UserModel::join('struktur', 'user.id_struktur', 'struktur.id_struktur')
            ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
            ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
            ->where('id_user', $params)
            ->first();

        if ($userStruktur->level == 1) {
            $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                ->where('nonrkat.next', $userStruktur->id_user)
                ->where('user.id_user', '!=', $userStruktur->id_user)
                ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                ->orderBy('nonrkat.id_nonrkat', 'DESC')
                ->get();
        } else if ($userStruktur->level == 2) {
            $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                ->where('nonrkat.next', $userStruktur->id_user)
                ->where('user.id_user', '!=', $userStruktur->id_user)
                ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                ->orderBy('nonrkat.id_nonrkat', 'DESC')
                ->get();
        } else if ($userStruktur->level == 3 || $userStruktur->level == 4) {
            if ($userStruktur->child1_level == "1" || $userStruktur->level == 3) {
                $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                    ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                    ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                    ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                    ->where('nonrkat.next', $userStruktur->id_user)
                    ->where('user.id_user', '!=', $userStruktur->id_user)
                    ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                    ->orderBy('nonrkat.id_nonrkat', 'DESC')
                    ->get();
            } else {
                $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                    ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                    ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                    ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                    ->where('nonrkat.next', $userStruktur->id_user)
                    ->where('user.id_user', '!=', $userStruktur->id_user)
                    ->where('struktur.id_struktur', $userStruktur->id_struktur)
                    ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                    ->orderBy('nonrkat.id_nonrkat', 'DESC')
                    ->get();
            }
        } else if ($userStruktur->level == 5) {
            $data = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
                ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
                ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
                ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
                ->where('nonrkat.next', $userStruktur->id_user)
                ->where('user.id_user', '!=', $userStruktur->id_user)
                ->where('struktur.id_struktur', $userStruktur->id_struktur)
                ->where('struktur_child1.id_struktur_child1', $userStruktur->id_struktur_child1)
                ->select('user.id_user', 'nonrkat.id_nonrkat', 'nonrkat.validasi_status', 'nonrkat.nama_status', 'user.fullname', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2', 'nonrkat.created_at')
                ->orderBy('nonrkat.id_nonrkat', 'DESC')
                ->get();
        }

        return response()->json([
            "data" => $data
        ]);
    }

    /**
     * Status
     */
    public function status($params)
    {
        $pengajuan = NonRKATModel::join('user', 'nonrkat.id_user', 'user.id_user')
            ->join('struktur', 'user.id_struktur', 'struktur.id_struktur')
            ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
            ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
            ->where('nonrkat.id_nonrkat', $params)
            ->select('nonrkat.id_nonrkat', 'struktur.level', 'struktur.nama_struktur', 'struktur_child1.nama_struktur_child1', 'struktur_child2.nama_struktur_child2')
            ->first();

        $sekniv = 0;
        $warek = 0;
        $status = [];
        if ($pengajuan->level == "1" || $pengajuan->level == "2") {
            if ($pengajuan->nama_struktur_child1 == "0") {
                array_push($status, [
                    "id_user" => $this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, $pengajuan->nama_struktur_child2),
                    "nama_struktur" => $pengajuan->nama_struktur,
                    "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, $pengajuan->nama_struktur_child2), $pengajuan->id_nonrkat, 1)
                ]);
            } else {
                array_push(
                    $status,
                    [
                        "id_user" => $this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, '0'),
                        "nama_struktur" => $pengajuan->nama_struktur_child1,
                        "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, '0'), $pengajuan->id_nonrkat, 1)
                    ],
                    [
                        "id_user" => $this->getID($pengajuan->nama_struktur, '0', '0'),
                        "nama_struktur" => $pengajuan->nama_struktur,
                        "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, '0', '0'), $pengajuan->id_nonrkat, 2, $pengajuan->level == 1 ? $sekniv : false)
                    ]
                );
                if ($pengajuan->level == 1) $sekniv = $sekniv + 1;
            }
        } elseif ($pengajuan->level == "3" || $pengajuan->level == "4") {
            if ($pengajuan->nama_struktur_child1 == "0") {
                array_push(
                    $status,
                    [
                        "id_user" => $this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, $pengajuan->nama_struktur_child2),
                        "nama_struktur" => $pengajuan->nama_struktur,
                        "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, $pengajuan->nama_struktur_child2), $pengajuan->id_nonrkat, 1)
                    ]
                );
            } else {
                array_push(
                    $status,
                    [
                        "id_user" => $this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, '0'),
                        "nama_struktur" => $pengajuan->nama_struktur_child1,
                        "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, '0'), $pengajuan->id_nonrkat, 1)
                    ],
                    [
                        "id_user" => $this->getID($pengajuan->nama_struktur, '0', '0'),
                        "nama_struktur" => $pengajuan->nama_struktur,
                        "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, '0', '0'), $pengajuan->id_nonrkat, 2, $pengajuan->level == 3 ? $warek : false)
                    ]
                );
                if ($pengajuan->level == 3) $warek = $warek + 1;
            }
        } elseif ($pengajuan->level == "5") {
            if ($pengajuan->nama_struktur_child2 == "0") {
                array_push(
                    $status,
                    [
                        "id_user" => $this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, '0'),
                        "nama_struktur" => $pengajuan->nama_struktur_child1,
                        "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, '0'), $pengajuan->id_nonrkat, 1)
                    ]
                );
            } else {
                array_push(
                    $status,
                    [
                        "id_user" => $this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, $pengajuan->nama_struktur_child2),
                        "nama_struktur" => $pengajuan->nama_struktur_child2,
                        "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, $pengajuan->nama_struktur_child2), $pengajuan->id_nonrkat, 1)
                    ],
                    [
                        "id_user" => $this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, '0'),
                        "nama_struktur" => $pengajuan->nama_struktur_child1,
                        "status" => $this->statusNull($this->getID($pengajuan->nama_struktur, $pengajuan->nama_struktur_child1, '0'), $pengajuan->id_nonrkat, 2)
                    ]
                );
            }
        }

        // Untuk data yang double seperti Dir. keuangan maka ambil data pertama
        //  dan kedua berdasarkan id_struktur dan status true
        // 0 = tolak
        // 1 = input/revisi
        // 2 = terima
        // 3 = upload bukti pencairan

        $struktur = UserModel::join('struktur', 'user.id_struktur', 'struktur.id_struktur')
            ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
            ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
            ->where('struktur.level', '1')
            ->where("struktur_child1.nama_struktur_child1", "0")
            ->where("struktur_child2.nama_struktur_child2", "0")
            ->orWhere('struktur.level', '2')
            ->where("struktur_child1.nama_struktur_child1", "0")
            ->where("struktur_child2.nama_struktur_child2", "0")
            ->orWhere('struktur.level', '3')
            ->where("struktur_child1.nama_struktur_child1", "0")
            ->where("struktur_child2.nama_struktur_child2", "0")
            ->orWhere('struktur_child1.child1_level', '1')
            ->select('user.id_user', 'struktur.id_struktur', 'struktur.nama_struktur', 'struktur_child1.id_struktur_child1', 'struktur_child1.nama_struktur_child1')
            ->get();

        array_push(
            $status,
            [
                "id_user" => $struktur[3]->id_user,
                "nama_struktur" => $struktur[3]->nama_struktur_child1,
                "status" => $this->statusNull($struktur[3]->id_user, $pengajuan->id_nonrkat, 2)
            ],
            [
                "id_user" => $struktur[2]->id_user,
                "nama_struktur" => $struktur[2]->nama_struktur,
                "status" => $this->statusNull($struktur[2]->id_user, $pengajuan->id_nonrkat, 2, $warek)
            ],
            [
                "id_user" => $struktur[1]->id_user,
                "nama_struktur" => $struktur[1]->nama_struktur,
                "status" => $this->statusNull($struktur[1]->id_user, $pengajuan->id_nonrkat, 2)
            ],
            [
                "id_user" => $struktur[3]->id_user,
                "nama_struktur" => $struktur[3]->nama_struktur_child1,
                "status" => $this->statusNull($struktur[3]->id_user, $pengajuan->id_nonrkat, 3)
            ],
            [
                "id_user" => $struktur[0]->id_user,
                "nama_struktur" => $struktur[0]->nama_struktur,
                "status" => $this->statusNull($struktur[0]->id_user, $pengajuan->id_nonrkat, 2, $sekniv)
            ]
        );

        return response()->json([
            "data" => $status
        ]);
    }

    /**
     * Status
     */
    public function history($params)
    {
        $data = NonRKATModel::join('nonrkat_validasi', 'nonrkat.id_nonrkat', 'nonrkat_validasi.nonrkat_id')
            ->where('nonrkat.id_nonrkat', $params)
            ->get();

        return response()->json([
            'data' => $data ? $data : "Failed, data not found"
        ]);
    }

    /**
     * Status
     */
    public function approved(Request $request)
    {
        $data = NonRKATModel::where('id_nonrkat', $request->id)->update([
            "validasi_status" => $request->validasi_status,
            "nama_status" => $request->nama_status,
            "next" => $request->next
        ]);
        $this->NonRKATValidasiModel($request->id, $request->id_struktur, $request->validasi_status, $request->nama_status, $request->message);
        $this->sendMail($request->id, $request->validasi_status, $request->nama_status);

        return response()->json([
            'data' => $data ? "Data was updated" : "Failed to update data"
        ]);
    }

    /**
     * Status
     */
    public function declined(Request $request)
    {
        $data = NonRKATModel::where('id_nonrkat', $request->id)->update([
            "validasi_status" => $request->validasi_status,
            "nama_status" => $request->nama_status,
            "next" => $request->next
        ]);

        $this->NonRKATValidasiModel($request->id, $request->id_struktur, $request->validasi_status, $request->nama_status, $request->message);
        $this->sendMail($request->id, $request->validasi_status, $request->nama_status);
        return response()->json([
            'data' => $data ? "Data was updated" : "Failed to update data"
        ]);
    }

    public function NonRKATValidasiModel($param1, $param2, $param3, $param4, $param5)
    {
        NonRKATValidasiModel::create([
            "nonrkat_id" => $param1,
            "id_struktur" => $param2,
            "status_validasi" => $param3,
            "message" => $param4 . " - " . $param5
        ]);
    }

    /**
     * Status
     */
    public function sendMail($params, $status, $nama)
    {
        if ($status == '0') {
            $status = ' telah ditolak oleh:' . $nama;
        } else if ($status == '1') {
            $status = ' telah diinput/direvisi oleh:' . $nama;
        } else if ($status == '3') {
            $status = ' Pencairan oleh:' . $nama;
        } else {
            $status = ' telah diterima oleh:' . $nama;
        }

        $data = $this->status($params);
        $data = array_unique($data->original['data'], SORT_REGULAR);
        $values = [];
        foreach ($data as $key) {
            $values[] = $key['id_user'];
        }
        $values = UserModel::whereIn('id_user', $values)->where('email', '!=', '')->select('email')->get();
        $email = [];
        foreach ($values as $key) {
            $email[] = $key['email'];
        }
        $template = array('name' => '', 'pesan' => 'Pemberitahuan pengajuan ' . $data[0]['nama_struktur'] . $status);

        Mail::send('mail', $template, function ($message) use ($email) {
            $message->to($email)->subject('APERKAT - Universitas Teknologi Sumbawa');
            $message->from(env('MAIL_USERNAME'), 'Notif APERKAT');
        });
    }

    /**
     * autoproccess
     * buat history
     * buat message
     * sendMail
     */
    public function autoproccess($params)
    {
    }

    public function statusNull($id_struktur, $id_nonrkat, $nomor, $warek = false)
    {
        if ($warek !== false) {
            $data = NonRKATValidasiModel::join('nonrkat', 'nonrkat_validasi.nonrkat_id', 'nonrkat.id_nonrkat')
                ->where('nonrkat.id_nonrkat', $id_nonrkat)
                ->where('nonrkat_validasi.id_struktur', $id_struktur)
                ->where('nonrkat_validasi.status_validasi', $nomor)
                ->skip($warek)
                ->first();
        } else {
            $data = NonRKATValidasiModel::join('nonrkat', 'nonrkat_validasi.nonrkat_id', 'nonrkat.id_nonrkat')
                ->where('nonrkat.id_nonrkat', $id_nonrkat)
                ->where('nonrkat_validasi.id_struktur', $id_struktur)
                ->where('nonrkat_validasi.status_validasi', $nomor)
                ->first();
        }

        return $data ? $data->status_validasi : false;
    }

    public function getID($a, $b, $c)
    {
        $data =  UserModel::join('struktur', 'user.id_struktur', 'struktur.id_struktur')
            ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
            ->join('struktur_child2', 'user.id_struktur_child2', 'struktur_child2.id_struktur_child2')
            ->where('struktur.nama_struktur', $a)
            ->where("struktur_child1.nama_struktur_child1", $b)
            ->where("struktur_child2.nama_struktur_child2", $c)
            ->select('user.id_user')
            ->first();
        return $data ? $data->id_user : null;
    }
}
