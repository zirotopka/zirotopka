@extends('admin.layouts.main')

@section('css')
    @parent
@overwrite

@section('js')
    @parent
@overwrite

@section("content")
 <?php echo phpinfo(); ?>
@overwrite
