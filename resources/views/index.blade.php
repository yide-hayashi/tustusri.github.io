@extends("base.layout")

@section("title","mysite")

@section("IndexBody")
    @includeIf("SectionObj.navigation",["homedata"=>$homedata,"PopNameTag"=>"#".$PopNameTag[0],"menu"=>$menu])
    <!-- Masthead-->
    @includeIf("SectionObj.Masthead",["homedata"=>$homedata,"PopNameTag"=>"#".$PopNameTag[1]])
    <!-- Portfolio Grid-->
     @includeIf("normal.PortfolioGrid")
    <!-- About-->
    @includeIf("SectionObj.about")
    <!-- Team-->
    @includeIf("SectionObj.team")
@endsection