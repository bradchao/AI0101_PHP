<form action="brad35.php" method='get'>
    Account: <input type="text" name="account"><br>
    <select name='zipcode'>
        <option value='401'>北屯區</option>
        <option value='402'>西屯區</option>
        <option value='403'>南屯區</option>
        <option value='404'>東屯區</option>
    </select><br>
    <input type="radio" name="gender" value="f" checked>Female
    <input type="radio" name="gender" value="m">Male<br>
    <input type='checkbox' name='habit[]' value="1">打電腦
    <input type='checkbox' name='habit[]' value="2">打籃球
    <input type='checkbox' name='habit[]' value="3">打電玩<br>
    <input type='checkbox' name='habit[]' value="4">打麻將
    <input type='checkbox' name='habit[]' value="5">打毛線
    <input type='checkbox' name='habit[]' value="6">打小孩<br>
    <input type="file" name="upload" />
    <input type="range" name="range" class="form-control-range" id="formControlRange">
    <textarea name='memo'>Hello, World</textarea>
    <input type="hidden" name="key" value="brad"/>

    <input type="submit" value="Register" />
</form>