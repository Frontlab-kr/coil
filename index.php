<div id="cm-body" class="cm-body">

	<?= view("_partials/_breadcrumb"); ?>

	<div class="cm-about-recruit">
		<div class="cm-inner">
			<div class="cm-about-recruit__title">
				<strong class="color-blue">코일마스터</strong>에<br />
				<strong>젊음과 열정</strong>을 아낌 없이 투자해 줄 
				<strong>훌륭한 인재</strong>를 모십니다.
			</div>
		</div>

		<div class="cm-about-recruit-talent">
			<div class="cm-about-recruit-talent__title" data-aos="fade-up">인재상</div>
			<div class="cm-about-recruit-talent__text" data-aos="fade-up" data-0="left:100%;" data-1000="left:-100%;">We are a team
			</div>
			<div class="cm-inner">
				<div class="cm-about-recruit-talent__list">
					<div class="swiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div data-aos="fade-up" data-aos-delay="200">
									<img src="../assets/images/about-us/talent01.png" alt="" />
									<strong>
										열정
										<span>Passion</span>
									</strong>
									<p>
										새로운 분야에 과감하게<br />
										도전하고 성취하고<br />
										뜨거운 열정이 있는 인재
									</p>
								</div>
							</div>
							<div class="swiper-slide">
								<div data-aos="fade-up" data-aos-delay="400">
									<img src="../assets/images/about-us/talent02.png" alt="" />
									<strong>
										국제화감각
										<span>Internationalization Sence</span>
									</strong>
									<p>
										글로벌 시대에 발맞춰 변화하는<br />
										국제 정세에 능동적으로 대처하고,<br />
										언어 능력을 갖추어 국제 감각을 실시간익히는 인재
									</p>
								</div>
							</div>
							<div class="swiper-slide">
								<div data-aos="fade-up" data-aos-delay="600">
									<img src="../assets/images/about-us/talent03.png" alt="" />
									<strong>
										전문성
										<span>Proffesionalism</span>
									</strong>
									<p>
										장인정신을 가지고 해당 분야에 대해 끊임<br />
										없이 학습하고, 배우고, 실천하여 업계의<br />
										실력가로 성장할 수 있는 인재
									</p>
								</div>
							</div>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
					<script>
						var swiperTalent = new Swiper('.cm-about-recruit-talent .swiper', {
							loop: true,
							slidesPerView: 1,
							navigation: {
								nextEl: '.cm-about-recruit-talent .swiper-button-next',
								prevEl: '.cm-about-recruit-talent .swiper-button-prev',
							},
							breakpoints: {
								992: {
									slidesPerView: 3,
								},
							},
						});
					</script>
				</div>
			</div>
			<script type="text/javascript">
				if (window.innerWidth >= 900) {
					var s = skrollr.init({
						edgeStrategy: 'set',
						easing: {
							WTF: Math.random,
							inverted: function (p) {
								return 1 - p;
							},
						},
					});
				}
			</script>
		</div>
		<div class="cm-about-recruit-welfare">
			<div class="cm-about-recruit-welfare__bg" data-aos="fade-right" data-aos-delay="400" data-aos-duration="600"></div>
			<div class="cm-inner">
				<div class="cm-about-recruit-welfare__title" data-aos="fade-up" data-aos-delay="500">복리후생</div>
				<div class="cm-about-recruit-welfare__list">
					<div class="cm-about-recruit-welfare__item" data-aos="fade-up" data-aos-delay="600">
						<p>
							<span>휴가사항</span>
							년차휴가, 경조휴가, 주 5일 근무를<br />
							기본으로 하고 있습니다.
						</p>
					</div>
					<div class="cm-about-recruit-welfare__item" data-aos="fade-up" data-aos-delay="700">
						<p>
							<span>사회보험</span>
							국민연금, 건강보험, 산재보험, <br />
							고용보험 등의 4대보험에<br />
							가입되어 있습니다.
						</p>
					</div>
					<div class="cm-about-recruit-welfare__item" data-aos="fade-up" data-aos-delay="800">
						<p>
							<span>경조사 지원</span>
							본인생일 등 각종 경조사를<br />
							지원하고 있습니다.
						</p>
					</div>
					<div class="cm-about-recruit-welfare__item" data-aos="fade-up" data-aos-delay="800">
						<p>
							<span>휴양 시설 지원</span>
							직원 휴가 시 회원가에 이용 가능한<br />
							숙박이용권 지원하고 있습니다.<br />
							(강원도 양양군, 제주도 제주시)
						</p>
					</div>
					<div class="cm-about-recruit-welfare__item" data-aos="fade-up" data-aos-delay="800">
						<p>
							<span>포상제도</span>
							5년, 10년 장기근속자 순금메달<br />
							증정 합니다.<br />
							매년우수사원 특별상여금 지급 합니다. <br />
							임.직원 국내/해외 여행을 지원하고<br />
							있습니다.
						</p>
					</div>
					<div class="cm-about-recruit-welfare__item" data-aos="fade-up" data-aos-delay="900">
						<p>
							<span>식대지원</span>
							직원들의 건강 증진을 위한<br />
							식비한도 없는 점심식대<br />
							지원하고 있습니다.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="cm-inner">
			<div class="cm-about-recruit-button">
				<a href="<?= langBaseUrl('recruit-apply'); ?>" data-aos="fade-up" data-aos-delay="200">
					<p>
						새로운 분야에<br class="mo" />
						<strong>과감하게 도전하고 성취하실<br />
							열정이 있는 분</strong>
						의 지원을 <br class="mo" />기다립니다.
					</p>
					<span> <strong>지원하기</strong> </span>
				</a>
			</div>
		</div>
	</div>
</div>
