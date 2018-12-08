<!--전달 메세지가 있는 경우 메세지 출력-->
@if (isset($message))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif