@extends("base.layout")

@section("title","mysite")

@section("IndexBody")
    <!-- Navigation-->
    
    @includeIf("SectionObj.navigation",["homedata"=>$homedata,"PopNameTag"=>"#".$PopNameTag[0],"menu"=>$menu])
    <!-- Masthead-->
    @includeIf("SectionObj.Masthead",["homedata"=>$homedata,"PopNameTag"=>"#".$PopNameTag[1]])
    <!-- Services-->
    @includeIf("SectionObj.services")
    <!-- Portfolio Grid-->
    @includeIf("SectionObj.PortfolioGrid")
    <!-- About-->
    @includeIf("SectionObj.about")
    <!-- Team-->
    @includeIf("SectionObj.team")
    <!-- Clients-->
    @includeIf("SectionObj.clients")  
    <!-- Contact-->   
    @includeIf("SectionObj.contact")  
    <!-- Footer-->
    @includeIf("SectionObj.base.footer")
    <!-- Portfolio Modals-->
    @includeIf("base.SettingPopuplayout",["SettingName"=>"設定首頁head"]);
    @includeIf("base.SettingPopup",["homedata"=>$homedata,"SettingName"=>"設定首頁內容"]);
   
@endsection