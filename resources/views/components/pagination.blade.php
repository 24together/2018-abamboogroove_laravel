<!--페이지네이션-->
<div class = "text-center" style="text-align: center">
    {{ $msgs->appends(['category' => $category,'range'=>$range,'search'=>$search])->links() }}
</div>