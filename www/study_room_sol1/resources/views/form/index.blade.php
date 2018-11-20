@extends('layouts.study_room_app')

@section('title','一覧画面')

@section('content')
<div class="content">
    <h3>登録者一覧</h3>
    <table class="table" id="form-table">
        <thead>
            <tr>
                <th class="id" width="50px">id</th>
                <th class="name">名前</th>
                <th class="mail">メールアドレス</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td class="id">{{$item->id}}</td>
                <td class="name">{{$item->name}}</td>
                <td class="mail">{{$item->mail}}</td>
                <td class="delete" width="100px">
                    <button id="delete-btn" class="delete-btn">削除</button>
                    <input type="hidden" class="delete_id" value="{{$item->id}}">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="complete"></div>
    <a href="/form" class="complete-btn"></a><br>
    <div>
        <a class="btn" href="/form/create">新規作成</a>
    </div>
</div>
@endsection
@section('scripts')
    <script>
    $(function() {
        $('.complete-btn').hide();
        $('.delete-btn').on('click', function() {
            id = $(this).next('.delete_id').val();
            data = {
                'id' : id,
            };
            console.log(data);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type : "POST",
                url : "/form/delete",
                content : "application/json",
                dataType : "json",
                data : data,
            }).done(function() {
                $('.complete').html('削除完了しました');
                $('.complete').css('color', '#43C2A6');
                $('.complete-btn').show().html('OK');
                $('.btn').hide();
            }).fail(function() {
                $('.complete').html('削除できませんでした');
                $('.complete').css('color', '#DEA800');
            });
        });
    });
    </script>
@endsection
