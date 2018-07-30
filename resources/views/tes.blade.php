<!DOCTYPE html>
<html>
<head>
	<title>Testing</title>
</head>
<body>
	<form role="form" method="POST" action="{{action('ProjectController@add_resource')}}">
        {{ csrf_field() }}
    </form>
</body>
</html>