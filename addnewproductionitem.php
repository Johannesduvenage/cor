<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add New Production Item</title>
  </head>

  <body>
    <form id="formAddNewRow" action="#">
      <label for="name">Name</label><input type="text" name="name" id="name" class="required" rel="0" />
      <br />
      <label for="name">Address</label><input type="text" name="address" id="address" rel="1" />
      <br />
      <label for="name">Postcode</label><input type="text" name="postcode" id="postcode"/>
      <br />
      <label for="name">Town</label><input type="text" name="town" id="town" rel="2" />
      <br />
      <label for="name">Country</label><select name="country" id="country">
        <option value="1">Serbia</option>
        <option value="2">France</option>
        <option value="3">Italy</option>
      </select>
      <br />
    </form>
  </body>
</html>
