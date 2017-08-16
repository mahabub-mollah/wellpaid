<?php get_header();
/*
template name: faq template

*/



?>
<section class="bnr_sec about_sec" style="background:url(<?php $about_bg_image = get_field('about_banner_image','option'); echo $about_bg_image['url']; ?>) no-repeat center center / cover">
    <div class="bnrWrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="bnr_title"><?php the_title();?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="blogSec">
	<div class="container"> 
	<!--<h2>Frequently Asked Questions</h2>-->
		<div class="wellpaidfaqCont">
			<div class="row">
				<div class="col-sm-6">
					<ul>
						<li>
							<b>Why does Well-Paid Maids pay their workers significantly above the industry average?</b> 
							<p>Like many people in the Washington, DC area, Well-Paid Maids wants the world we live in to reflect our values. Our company pays its workers a living-wage because we believe no one working a full-time job should live in poverty.</p>
						</li>	
						<li>
							<b>What are the labor practices of Well-Paid Maids’ competitors?</b> 
							<p>As outlined in <a href="#">Where They Stand: Choosing a Maid Service in the Washington, DC Area</a>, we simply don’t know.  Our competitors are not transparent about the wages and benefits their workforce receives.</p>
						</li>	
						<li>
							<b>Is Well-Paid Maids extremely expensive?</b> 
							<p>No.  In fact, we charge a comparable price to the competition despite being Washington, DC’s only living-wage maid service.  For more information, take a look at <a href="#">What They Charge:  Comparing Maid Service Pricing in the Washington, DC Area</a>.</p>
						</li>	
						<li>
							<b>Does Well-Paid Maids use green cleaning products?</b> 
							<p>Yes. We only use <a href="3">products</a> with an “A” rating from the <a href="#">Environmental Working Group</a>, the country’s leading product rating organization regarding consumer health and environmental sustainability.</p>
						</li>	
												<li>
							<b>Who works for Well-Paid Maids?</b> 
							<p>Check out our team on the <a href="#">About Us</a> page.</p>
						</li>	
												<li>
							<b>Where can I go to learn more about living wage employers?</b> 
							<p>Unfortunately, the Washington, DC area does not currently have a registry of living-wage employers. If you or your organization is interested in building a registry, please contact us to discuss a possible partnership.</p>
						</li>	
												<li>
							<b>What happens if something breaks during a cleaning?</b> 
							<p>Our general liability insurance will cover damages up to $1,000,000.  If anything goes wrong during your cleaning, please call us at 202-380-6480.</p>
						</li>	
												<li>
							<b>What is your service area?</b> 
							<p>We serve Washington, DC and all directly adjacent suburbs.  <a href="#">Click here for a map of our service area.</a></p>
						</li>	
											</ul>
				</div>
				<div class="col-sm-6">
					<ul>
												<li>
							<b>Do you do move-in/move-out cleanings?</b> 
							<p>Yes, for an additional fee of $60, you can add &#8220;Move-In/Move-Out&#8221; as an extra in our <a href="#" >booking platform</a>.</p>
						</li>	
						<li>
							<b>Do you do construction clean-ups?</b> 
							<p>No.  Construction clean-ups could unsafely expose our employees to harmful substances such as asbestos particles or lead-paint dust.  Please hire another company that provides their employees with the equipment and training necessary for cleaning up after construction.</p>
						</li>	
						<li>
							<b>What is included in a cleaning?</b> 
							<p>Cleanings include a complete vacuuming and mopping of all floors as well as counter top, table, mirror, and major appliance dusting and cleaning.  All interior rooms (kitchen, bathroom, bedroom, living room, etc.) will be cleaned. Additional items, such as refrigerator or microwave interiors, can be added through our <a href="#">booking system</a>.</p>
						</li>	
						<li>
							<b>Can I request extras?</b> 
							<p>Yes.  Extra cleaning areas, such as microwave interiors or interior windows, can be added through our booking system.</p>
						</li>	
						<li>
							<b>Do you bring your own supplies?</b> 
							<p>Yes.  All of our cleaning products can be viewed on the <a href="#">Products Used</a> page.</p>
						</li>	
						<li>
							<b>What insurance does your company have?</b> 
							<p>We use Erie Insurance for general liability up to $1,000,000.</p>
						</li>	
												<li>
							<b>What bonding does your company have?</b> 
							<p>We are bonded through JW Surety Bonds for up to $5000.</p>
						</li>	
						<li>
							<b>Are all employees subject to a background check?</b> 
							<p>Yes. We use <a href="#">GoodHire</a>, a leading background check provider, to screen all of our prospective employees.</p>
						</li>	
						<li>
							<b>What should I do if I need to reschedule or cancel?</b> 
							<p>Just give us a call at 202-380-6480 or email us at <a href="#">aaron@wellpaidmaids.com</a>. We ask that you please reschedule no less than 24 hours in advance.</p>
						</li>	
						<li>
							<b>Will I have to pay a fee if I cancel?</b> 
							<p>If cancelling less than 24 hours in advance, we require a $50 cancellation fee.  To cancel, please call 202-380-6480 or email <a href="#">aaron@wellpaidmaids.com</a>.</p>
						</li>	
												<li>
							<b>How can I be sure my payment data is kept safe?</b> 
							<p>Our website uses SSL encryption to keep all your information safe.  In addition, all payments are processed through either PayPal or Stripe, ensuring that your credit/debit card information goes through their systems, not ours.</p>
						</li>	
												<li>
							<b>What is your satisfaction guarantee?</b> 
							<p>If you&#8217;re not satisfied, we’re not satisfied.  If there is a problem with your cleaning, please give us a call at 202-380-6480 to schedule a free follow-up cleaning.</p>
						</li>	
											</ul>
				</div>
			</div>
		</div>
    </div>
</div>




<?php get_footer();?>