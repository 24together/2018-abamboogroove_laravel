
<a id="kakao-login-btn"></a>
<a href="http://developers.akao.com/logout"></a>
<script type='text/javascript'>
    //<![CDATA[
    // 사용할 앱의 JavaScript 키를 설정해 주세요.
    Kakao.init('a62eff5eade710874215d9ca1946d91d');
    // 카카오 로그인 버튼을 생성합니다.
    Kakao.Auth.createLoginButton({
        container: '#kakao-login-btn',
        success: function(authObj) {
            location.href="{{url('kakao/login')}}"
        },
        fail: function(err) {
            alert(JSON.stringify(err));
        }
    });
    //]]>
</script>
