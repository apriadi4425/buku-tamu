<?php
function form_kanan($id, $name, $type, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<label for="'.$id.'" class="col-sm-2 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '<div class="col-sm-10">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'" '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '</div>';
}
function form_kanan_pendek($id, $name, $type, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<label for="'.$id.'" class="col-sm-3 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '<div class="col-sm-9">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'" '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '</div>';
}

function form_kanan_edit($id, $name, $type, $value, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<label for="'.$id.'" class="col-sm-3 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '<div class="col-sm-9">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'"  value="'.$value.'" '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '</div>';
}
function form_kanan_edit3($id, $name, $type, $value, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<label for="'.$id.'" class="col-sm-4 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '<div class="col-sm-8">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'"  value="'.$value.'" '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '</div>';
}
function form_kiri($id, $name, $type, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<div class="col-sm-9">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'"  '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '<label for="'.$id.'" class="col-sm-3 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '</div>';
}

function form_kiri_pendek($id, $name, $type, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<div class="col-sm-9">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'"  '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '<label for="'.$id.'" class="col-sm-3 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '</div>';
}

function form_kanan_edit_2($id, $name, $type, $value, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<label for="'.$id.'" class="col-sm-2 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '<div class="col-sm-10">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'"  value="'.$value.'" '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '</div>';
}

function form_kiri_edit($id, $name, $type, $value, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<div class="col-sm-9">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'"  value="'.$value.'" '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '<label for="'.$id.'" class="col-sm-3 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '</div>';
}
function form_kiri_edit3($id, $name, $type, $value, $readonly = null, $required = null){
	echo '<div class="form-group row">';
	echo '<div class="col-sm-8">';
	echo '<input type="'.$type.'" class="form-control" id="'.$id.'" name="'.$id.'" placeholder="'.$name.'"  value="'.$value.'" '.$readonly.' '.$required.'>';
	echo '</div>';
	echo '<label for="'.$id.'" class="col-sm-4 col-form-label"><p class="text4">'.$name.'</p></label>';
	echo '</div>';
}

function form_hidden($id)
{
	echo '<input type="hidden" id="' . $id . '" name="' . $id . '" >';
}
