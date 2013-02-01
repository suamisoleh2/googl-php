<?php

/**
* This file is part of googl-php
*
* https://github.com/sebi/googl-php
*
* googl-php is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

function assert_equals($is, $should) {
  if($is != $should) {
    exit(1);
  }
}

function assert_url($is) {
  if(!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $is)) {
    exit(1);
  }
}

require 'Googl.class.php';

$googl = new Googl();

assert_url($googl->shorten('http://www.google.ch'));
assert_equals($googl->expand('http://goo.gl/fbsS'), 'http://www.google.com');

assert_url($googl->shorten('https://www.facebook.com'));
assert_equals($googl->expand('http://goo.gl/wCWWd'), 'http://www.php.net/');
