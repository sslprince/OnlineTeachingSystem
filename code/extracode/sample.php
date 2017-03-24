<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<script language="javascript" type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $(':button[name=add]').click(function(){
        insertTr();
    })
    $('button[name=del]').click(function(){
        $(this).parents('tr').remove();
    })
    $(':button[name=delall]').click(function(){
        $('.itme').remove();
    })
})
var gradeI=1;
function insertTr(){
    var html='';
    html+='<tr class="itme"><td><input type="text" name="data[time][]"></td>';
    html+='<td><input type="radio" name="data[grade]['+gradeI+']" value="1">好<input type="radio" name="data[grade]['+gradeI+']" value="2">很好</td>';
    html+='<td><select name="data[type][]"><option value="优秀生">优秀生</option><option value="三好生">三好生</option></select></td>';
    html+='<td><button name="del">删除</button></td></tr>';
    $('#tab').append(html);
    $('button[name=del]').click(function(){
        $(this).parents('tr').remove();
    })
    gradeI++;
}
</script>
</head>
<body>

<form action="exe.php" method="post" name="f1">
    <table width="500px" id="tab">
        <tr><th>日期</th><th>级别</th><th>种类</th><th>操作</th></tr>
        <tr class="itme">
            <td><input type="text" name="data[time][]"></td>
            <td><input type="radio" name="data[grade][0]" value="1">好<input type="radio" name="data[grade][0]" value="2">很好</td>
            <td><select name="data[type][]"><option value="优秀生">优秀生</option><option value="三好生">三好生</option></select></td>
            <td><button name="del">删除</button></td>
        </tr>
    </table>
    <div><input type="submit" name="sub" value="保存" /><input type="button" name="delall" value="全部删除"><input type="button" name="add" value="增加"></div>
</form>

</body>
</html>  
