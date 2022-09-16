@extends("base.layout")

@section("title","mysite")

@section("IndexBody")
    <!-- Navigation-->
    @includeIf("SectionObj.navigation")
    <!-- Masthead-->
    @includeIf("SectionObj.Masthead")
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
    @includeIf("SectionObj.PortfolioModals")
@endsection