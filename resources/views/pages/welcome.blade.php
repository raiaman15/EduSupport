@extends('layouts.app')

@section('head')
<style>
    html, body {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;
        font-weight: 100;
        color: white;
        background-color: #0099CC;
    }

    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
    }

</style>
@stop

@section('content')
<div class="container">
    <div class="content">
        <div><h1 class="h1-responsive"><big><big><big><big>{{ env('APP_NAME') }}</big></big></big></big></h1>
        <a href="/study" class="btn unique-color" style="width:100px;height:100px;line-height:125px;border-radius: 50%;text-align:center;vertical-align:middle;"><i class="fa fa-rocket fa-4x" aria-hidden="true"></i></a>USER<br/>
        <a href="/admin_dashboard" class="btn unique-color" style="width:100px;height:100px;line-height:125px;border-radius: 50%;text-align:center;vertical-align:middle;"><i class="fa fa-lock fa-4x" aria-hidden="true"></i></a>ADMIN<br/>
        </div>
    </div>
</div>
@stop