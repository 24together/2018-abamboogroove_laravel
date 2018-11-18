<!--로그인 체크-->
<script>
    @if(!\Auth::check())
    alert('로그인을 하고 난 후에 이용해주세요');
    history.back();
    @endif
</script>