 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title></title>
 </head>
 <body>
     <h2>Chào bạn {{$data['email']}},</h2>
     <p>Website đã nhận được yêu cầu thay đổi mật khẩu của bạn.</p>
     <p>Xin hãy click vào đường dẫn sau để đổi mật khẩu:{{$data['url']}}</p>
     <p>Trân trọng.</p>
     <p><b>MAG</b></p>
 </body>
 </html>