<?php

setcookie('name', 'zhangsan', time()+3600, '/');
print_r($_COOKIE);
