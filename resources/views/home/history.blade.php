@extends('layouts.app')

{{-- HTML Title --}}
@section('html-title')

@endsection


{{-- VENDOR CSS --}}
@section('css-top')

@endsection

{{-- CUSTOM CSS --}}
@section('css-bot')

@endsection

{{-- Page Title --}}
@section('page-title')
History
@endsection

{{-- Bread Crumb --}}
@section('breadcrumb')
<li>Home</li>
<li>History</li>
@endsection


{{-- Main Content --}}
@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="card-box">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="m-t-0 header-title">History of Vaccine</h4>
                    <p>
                    	The practice of immunization dates back hundreds of years. Buddhist monks drank snake venom to confer immunity to snake bite and variolation (smearing of a skin tear with cowpox to confer immunity to smallpox) was practiced in 17th century China. Edward Jenner is considered founder of vaccinology in the west in 1796, after he inoculated a 13 year-old-boy with vaccinia virus (cowpox), and demonstrated immunity to smallpox. In 1798, the first smallpox vaccine was developed. Over the 18th and 19th centuries, systematic implementation of mass smallpox immunization culminated in its global eradication in 1979. 
                    	<br><br>
						Louis Pasteur’s experiments spearheaded the development of live attenuated cholera vaccine and inactivated anthrax vaccine in humans (1897 and 1904, respectively). Plague vaccine was also invented in the late 19th Century. Between 1890 and 1950, bacterial vaccine development proliferated, including the Bacillis-Calmette-Guerin (BCG) vaccination, which is still in use today 
						<br><br>
						In 1923, Alexander Glenny perfected a method to inactivate tetanus toxin with formaldehyde. The same method was used to develop a vaccine against diphtheria in 1926. Pertussis vaccine development took considerably longer, with a whole cell vaccine first licensed for use in the US in 1948. 
						<br><br>
						Viral tissue culture methods developed from 1950-1985, and led to the advent of the Salk (inactivated) polio vaccine and the Sabin (live attenuated oral) polio vaccine. Mass polio immunization has now eradicated the disease from many regions around the word. Attenuated strains of measles, mumps and rubella were developed for inclusion in vaccine. Measles is currently the next possible target for elimination via vaccination. Despite the evidence of health gains from immunization programmers there has always been resistance to vaccines in some groups. The late 1970s and 1980s marked a period of increasing litigation and decreased profitability for vaccine manufacture, which led to a decline in the number of companies producing vaccines. The decline was arrested in part by the implementation of the National Vaccine Injury Compensation programmer in the US in 1986. The legacy of this era lives on to the present day in supply crises and continued media efforts by a growing vociferous anti-vaccination lobby. 
						<br><br>
						Molecular genetics sets the scene for a bright future for vaccinology, including the development of new vaccine delivery systems (e.g. DNA vaccine, viral vectors, plant vaccine and topical formulation), new adjuvants, the development of more effective tuberculosis vaccine, and vaccines against cytomegalovirus (CMV), herpes simplex virus (HSV), respiratory syncytial virus (RSV), staphylococcal disease, streptococcal disease, pandemic influenza, shigella, HIV and schistosomiasis among others. Therapeutic vaccines may also soon be available for allergies, autoimmune diseases and addictions.
                    </p>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection


{{-- VENDOR JS --}}
@section('js-top')

@endsection

{{-- Js Script --}}
@section('js-bot')

@endsection