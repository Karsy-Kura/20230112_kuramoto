@extends('layouts.todo')
<style>
  :root {
    --btn-color-find: #cdf119;
  }

  .button__find {
    border: 2px solid var(--btn-color-find);
    color: var(--btn-color-find);
    white-space: nowrap;

    /* common */
    background-color: var(--bg-card-common);
    border-radius: 5px;
    padding: 8px 16px;
    font-size: 12px;
    font-weight: bold;
    transition: .4s;
    text-align: left;
    cursor: pointer;
  }

  .button__find:hover {
    background-color: var(--btn-color-find);
    color: var(--btn-color-common);
    transition: .4s;
  }
</style>

@section('title', 'TodoList')

@section('button__find')
<form action="/todo/find" method="get">
  @csrf
  <button class="button__find">タスク検索</button>
</form>
@endsection

@section('button__action', '追加')