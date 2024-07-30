<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$mailData['title']}}</title>
</head>
<body>
<h3>Dear {{$mailData['cs']}},</h3>
<p>Email ini dikirim oleh aplikasi tiketing PT.Timah</p>
<p>Anda telah membuat tiket dan membutuhkan persetujuan.</p>
<p></p>

<p>Ticket : <strong>{{$mailData['no_ticket']}}</strong></p>
<p>Date : <strong>{{$mailData['date']}}</strong></p>

<p>subject : <strong>{{$mailData['subject']}}</strong></p>
<p>Message : {{$mailData['message']}}</p>
<p></p>

<p>Silahkan <a href="">Cek Tiket</a>, untuk melihat progress tiket anda.</p> 

<p></p>
<p></p>
<p>Terima kasih</p>
</body>
</html>