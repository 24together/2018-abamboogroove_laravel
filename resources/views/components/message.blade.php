<!--전달 메세지가 있는 경우 메세지 출력-->
@if (isset($message))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif