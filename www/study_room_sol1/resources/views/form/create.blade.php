@extends('layouts.study_room_app')

@section('title', '新規作成')

@section('content')
    <div class="content">
        <div class="link-btn">
            <a class="index" href="/form">一覧に戻る</a>
        </div>
        <div>
            <table>
                <tr>
                    <th class="label">名前</th>
                    <td><input type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="text" name="mail" id="mail"></td>
                </tr>
            </table>
            <div class="complete"></div>
            <a href="/form" class="complete-btn"></a>
            <button class="btn">登録</button>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
    $(function() {
        $('.complete-btn').hide();
        $('.btn').on('click', function() {
            data = {
                'name':$('#name').val(),
                'mail':$('#mail').val()
                };
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type : "POST",
                url : "/form/save",
                content : "application/json",
                dataType : "json",
                data : data,
            }).done(function() {
                console.log('成功');
                $('.complete').html('登録完了しました').css('color', '#37A089');
                $('.complete-btn').show().html('OK');
                $('.btn').hide();
            }).fail(function() {
                $('.complete').html('登録に失敗しました').css('color', '#37A089');
            });
        });
    });
    </script>
@endsection
