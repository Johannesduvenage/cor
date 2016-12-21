// JavaScript Document
function toggle(theinput) {
  if (theinput)
    return 1
  else
    return 0;
}

function corsetdate() {
  var cordate = new Date();
  var corday = cordate.getDate();
  var cormonth = cordate.getMonth() + 1;
  var coryear = cordate.getFullYear();
  document.getElementById('cordate').value = corday + "/" + cormonth + "/" + coryear;
}

function toggleselectall(field) {
  for (i = 0; i < field.length; i++)
    if (field[i].checked == false)
      field[i].checked = true;
    else
      field[i].checked = false;
}

// get the ISO formatted date for now.
function corgetdate() {
  var cordate = new Date();
  function pad(n) {
    return n < 10 ? '0' + n : n;
  }
  return cordate.getDate() + '/'
          + pad(cordate.getMonth() + 1) + '/'
          + pad(cordate.getFullYear())
}

function corgettime() {
  var cortime = new Date();
  function pad(n) {
    return n < 10 ? '0' + n : n;
  }
  if (cortime.getHours() == 12)
    hours = 12
  else if (cortime.getHours() > 12)
    hours = cortime.getHours() - 12
  else
    hours = cortime.getHours();
  return hours + ':'
          + pad(cortime.getMinutes())
          + (cortime.getHours() < 11 ? ' am' : ' pm');
}
