@extends("base.layout")

@section("title","mysite")

@section("IndexBody")
    <!-- Navigation-->
    
    @includeIf("SectionObj.navigation",["homedata"=>$homedata,"PopNameTag"=>"#".$PopNameTag[0],"menu"=>$menu])
    <!-- Masthead-->
    @includeIf("SectionObj.masthead",["homedata"=>$homedata,"PopNameTag"=>"#".$PopNameTag[1]])
    <!-- Portfolio Grid-->
    @includeIf("SectionObj.PortfolioGrid",["protfolioData"=>$protfolioData,"PopNameTag"=>$PopNameTag])
    <!-- About-->
    @includeIf("SectionObj.about")
    <!-- Team-->
    @includeIf("SectionObj.team")
    <!-- Portfolio Modals-->
    @includeIf("SectionObj.settingpop.settingImgupload",["SettingName"=>"設定首頁head"])
    @includeIf("SectionObj.settingpop.SettingIndexTitlePopup",["SettingName"=>"設定首頁內容"])
    @includeIf("SectionObj.settingpop.settingprotfolioTitle",["SettingName"=>"設定專案頁面標題"])
    @includeIf("SectionObj.settingpop.settingAboutmeTitle",["SettingName"=>"設定關於我頁面標題"])
@endsection