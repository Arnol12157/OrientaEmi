<?php
    $estu=Estudiantes::query()->where('ci','!=','0')->get();
?>