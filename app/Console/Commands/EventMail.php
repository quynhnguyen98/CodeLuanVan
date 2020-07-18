<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;
use DB;
class EventMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gửi mail ngày giổ tổ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sukien=DB::table('sukien')->select('nguoi.hoten','nguoi.ngaymat')->join('nguoi','sukien.id_nguoi','=','nguoi.id_nguoi')->orderBy('nguoi.ngaymat','asc')->get();
        $nguoi=DB::table('taikhoan')->get();
        $now=strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
        foreach($sukien as $sk)
        {
            $po=date('d-m',strtotime($sk->ngaymat)).'-2020';
            $event=strtotime($po);
            if($event==$now)
                {
                    foreach($nguoi as $ng)
                    {
                        $data=[
                            'email'=>$ng->email,
                            'ngaymat'=>$po,
                            'hoten'=>$sk->hoten,
                        ];
                        Mail::to($ng->email)->send(new \App\Mail\GioToMail($data));
                    }    
                }            
         }
    }
}