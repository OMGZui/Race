<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>注册邮件</title>
</head>

<body>
	@component('mail::message')
     - {{ $name }} 
		 - {{ $en_name }}
		 - {{ $desc }}
		 - {{ $app_desc }}
    @endcomponent
</body>

</html>