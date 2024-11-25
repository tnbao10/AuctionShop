<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use Datetime;
class AuditPusherEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $auditTime;
    public $auditPrice;
    public $userId;
    public $auditId;
    public $maxPrice;

    public function __construct(Request $request)
    {
        $this->message = $request->contents;
        $this->auditTime = Carbon::now()->toDateTimeString();
        $this->auditPrice = number_format($request->auditPrice);
        $this->auditId = $request->auditId;
        $this->userId = $request->userId;
        DB::table('chitietdaugia')->insert(
            [
                'ctdg_thoigian' => Carbon::now(),
                'ctdg_giatien' => $request->auditPrice,
                'dg_id' => $request->auditId,
                'nd_id' => $request->userId,
                'created_at' => Carbon::now()
            ]
        );

        $maxPrice = DB::table('chitietdaugia')
        ->where('dg_id', $request->auditId)
        ->orderBy('ctdg_thoigian','desc')
        ->first();
        $this->maxPrice = number_format($maxPrice->ctdg_giatien);
    }

    public function getAuth() {
        $id = Auth::guard('nguoidung')->id();
        return $id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['audit'];
    }

    public function broadcastAs()
    {
        return 'audit-action';
    }
}
