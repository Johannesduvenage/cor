/* 
 * The MIT License
 *
 * Copyright 2016 Darren Shane Bailey.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

const HTTP_STATUS_CODE = {
  OK: 200,
  UNAUTHORISED: 401,
  FORBIDDEN: 403,
  NOT_FOUND: 404
};

const AJAX_READY_STATE = {
  UNINITIALISED: 0,
  SET_UP_NOT_SENT: 1,
  SENT: 2,
  IN_FLIGHT: 3,
  COMPLETE: 4
};

function toggle(theinput) {
  if (theinput) return 1;
  else return 0;
};

function corsetdate() {
  let cordate = new Date();
  let corday = cordate.getDate();
  let cormonth = cordate.getMonth() + 1;
  let coryear = cordate.getFullYear();
  document.getElementById(
    'cordate').value = corday + "/" + cormonth + "/" + coryear;
};

function toggleselectall(field) {
  for (i = 0; i < field.length; i++)
    if (field[i].checked === false) field[i].checked = true;
    else field[i].checked = false;
};

// get the ISO formatted date for now.
function corgetdate() {
  let cordate = new Date();
  function pad(n) {
    return n < 10 ? '0' + n : n;
  }
  return cordate.getDate() + '/' + pad(
    cordate.getMonth() + 1) + '/' + pad(cordate.getFullYear());
};

function corgettime() {
  let cortime = new Date();

  function pad(n) {
    return n < 10 ? '0' + n : n;
  };

  if (cortime.getHours() === 12) hours = 12;
  else if (cortime.getHours() > 12) hours = cortime.getHours() - 12;
  else hours = cortime.getHours();

  return hours + ':' + pad(cortime.getMinutes()) + (
    cortime.getHours() < 11 ? ' am' : ' pm');
};
