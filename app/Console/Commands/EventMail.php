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
        $sukien=DB::table('sukien')->select('nguoi.hoten','sukien.title','sukien.start')->join('nguoi','sukien.id_nguoi','=','nguoi.id_nguoi')->orderBy('sukien.start','asc')->get();
        $nguoi=DB::table('taikhoan')->get();
        $now=strtotime(Carbon::now('Asia/Ho_Chi_Minh'));
        foreach($sukien as $sk)
        {
            $end=date('d-m',strtotime($sk->start)).'-'.Carbon::now()->year.'23:59:59';
            $start=date('d-m',strtotime($sk->start)).'-'.Carbon::now()->year.'00:00:00';;
            $eventstart=strtotime($start);
            $eventend=strtotime($end);
            if(($eventstart<=$now)&&($now<=$eventend))
                {
                    foreach($nguoi as $ng)
                    {
                        $data=[
                            'email'=>$ng->email,
                            'ngaymat'=>$start,
                            'hoten'=>$sk->hoten,
                            'noidung'=>$sk->title,
                        ];
                        Mail::to($ng->email)->send(new \App\Mail\GioToMail($data));
                    }    
                }            
         }
    }
}
