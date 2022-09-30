@extends("base.layout")

@section("title","Mysite-Lin Yide's portfolio site")

@section("IndexBody")
    @includeIf("SectionObj.navigation",["homedata"=>$homedata,"PopNameTag"=>"#".$PopNameTag[0],"menu"=>$menu])
    <!-- Masthead-->
    @includeIf("SectionObj.masthead",["homedata"=>$homedata,"PopNameTag"=>"#".$PopNameTag[1]])
    <!-- Portfolio Grid-->
    @includeIf("normal.PortfolioGrid")
    <!-- About-->
    @includeIf("SectionObj.about")
    <!-- Team-->
    @includeIf("SectionObj.team")
@endsection