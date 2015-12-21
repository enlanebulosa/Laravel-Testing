<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>File Upload</h1>
    <form action="/upload" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        File：<br/>
        <input type="file" name="upfile" size="30"/><br/>
        <br/>
        <input type="submit" value="Upload"/>
    </form>
</body>
</html>