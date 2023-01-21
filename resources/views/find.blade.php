@extends('layouts.todo')
<style>
  :root {
    --btn-color-back: #6d7170;
  }

  .button__back {
    border: 2px solid var(--btn-color-back);
    color: var(--btn-color-back);
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
    background-color: var(--btn-color-back);
    color: var(--btn-color-common);
    transition: .4s;
  }
</style>

@section('title', 'TodoList')

@section('select__default')
@endsection

@section('todo__action')
<form action="/todo/search" method="get" class="todo__create--form">
  @csrf
  <input class="content__common content__add" type="text" name="content">
  <select class="select__tag" name="tag_id">
    <option selected disabled></option>
    @foreach ($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->name}}</option>
    @endforeach
  </select>
  <button class="button__common button__add">検索</button>
</form>
@endsection

@section('card__footer')
<form action="/" method="get">
  @csrf
  <button class="button__back">戻る</button>
</form>
@endsection