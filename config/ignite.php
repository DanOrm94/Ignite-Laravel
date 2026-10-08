<?php

/*
|--------------------------------------------------------------------------
| Ignite Talent Group — site content
|--------------------------------------------------------------------------
|
| This file is the PHP port of the `sites`, `CONTACT`, `policyLinks` and
| `heroImages` objects that previously lived in the static site's app.js.
| The Blade templates read from here so every sector page renders
| server-side with exactly the same content as the original site.
|
*/

return [

    // Whether the public testimonial submission form accepts new reviews.
    // The original static site kept this closed pending the moderation flow.
    'reviews_open' => env('IGNITE_REVIEWS_OPEN', false),

    'contact' => [
        'phone' => '0161 566 1050',
        'phone_href' => 'tel:+441615661050',
        'email' => 'info@ignitetalentgroup.co.uk',
        'data_protection_email' => 'dataprotection@ignitetalentgroup.co.uk',
        'address' => 'Cardinal House, 20 St Mary’s Parsonage, Manchester M3 2LY',
        'linkedin' => 'https://www.linkedin.com/company/ignite-talent-group/home/',
    ],

    // Shared public policy library (filenames resolved to documents/policies/).
    'policy_links' => [
        ['Privacy Notice', 'IG-WEB-001_Privacy_Notice.pdf'],
        ['Data Protection', 'IG-POL-003_Data_Protection_Statement.pdf'],
        ['Ethical Recruitment', 'IG-POL-005_Ethical_Recruitment_Policy.pdf'],
        ['Right to Work & Vetting', 'IG-POL-004_Right_to_Work_and_Candidate_Vetting_Policy.pdf'],
        ['Equality, Diversity & Inclusion', 'IG-POL-016_Equality_Diversity_and_Inclusion_Policy.pdf'],
        ['Modern Slavery', 'IG-POL-002_Modern_Slavery_and_Labour_Exploitation_Statement.pdf'],
        ['Information Security', 'IG-POL-013_Information_Security_Policy.pdf'],
        ['Complaints', 'IG-POL-009_Complaints_Policy.pdf'],
    ],

    'hero_images' => [
        'group' => ['src' => 'assets/ignite-people-hero.png', 'alt' => 'Professionals collaborating in a Manchester workplace overlooking the city'],
        'construction' => ['src' => 'construction/constructionhero.png', 'alt' => 'Construction professionals working on site'],
        'engineering' => ['src' => 'engineering/engineeringhero.png', 'alt' => 'Engineering professionals working in a technical environment'],
        'tech' => ['src' => 'technology/techhero.png', 'alt' => 'Technology professionals collaborating in a modern workspace'],
        'legal' => ['src' => 'legal/legalhero.png', 'alt' => 'Legal professionals working in a professional environment'],
        'sales' => ['src' => 'assets/ignite-people-hero.png', 'alt' => 'Sales professionals collaborating in a Manchester workplace'],
    ],

    // Order used to render the brand grid / switcher (excludes group).
    'sector_order' => ['construction', 'engineering', 'tech', 'legal', 'sales'],

    'sites' => [

        'group' => [
            'name' => 'Ignite Talent Group',
            'short' => 'Talent Group',
            'entity' => 'Ignite Talent Group Ltd',
            'company_number' => '16657250',
            'registered_office' => 'C/O Burton Varley Ltd, The Counting House, 24 Richmond Road, Bowdon, Altrincham, England, WA14 2TT',
            'ico' => 'ZC135847',
            'route' => 'group',
            'logo' => 'assets/ignite-talent-group.svg',
            'accent' => '#4552ff',
            'accent_rgb' => '69,82,255',
            'accent_text' => '#ffffff',
            'eyebrow' => 'Specialist recruitment group',
            'title' => 'Hire smarter. Grow stronger.',
            'lead' => 'We connect ambitious businesses and talented professionals through five specialist recruitment companies — each with sector focus, all backed by shared group standards.',
            'image_label' => 'Manchester insight. UK-wide reach.',
            'intro_title' => 'Specialist knowledge, connected by one clear standard.',
            'intro' => 'Ignite brings Construction, Engineering, Tech, Legal and Sales recruitment together under one accountable group. Clients get focused market knowledge; candidates get a straightforward, respectful experience.',
            'highlight' => 'Five specialist markets. One joined-up recruitment partner.',
            'services' => [
                ['Specialist search', 'Focused recruitment led by teams who understand the language, pace and priorities of their market.'],
                ['Flexible hiring support', 'Permanent, interim and contract recruitment shaped around the brief and the organisation.'],
                ['Safer hiring decisions', 'A clear compliance framework, with background-check services available through Personnel Checks.'],
            ],
            'markets' => ['Construction', 'Engineering', 'Technology', 'Legal', 'Sales'],
            'market_intro' => 'Choose the specialist team that speaks your market.',
            'client_copy' => 'Brief one specialist team or start at group level. We focus the search, communicate clearly and help you move from role definition to appointment with confidence.',
            'candidate_copy' => 'Talk to a recruiter who understands your field, what a good move looks like and why clarity matters throughout the process.',
            'compliance_title' => 'Confidence should be visible.',
            'compliance_copy' => 'Our public policy hub brings the core standards behind our recruitment work into one easy-to-review place — useful for clients, candidates, procurement teams and supplier onboarding.',
        ],

        'construction' => [
            'name' => 'Ignite Construction',
            'short' => 'Construction',
            'entity' => 'Ignite Construction Talent Ltd',
            'company_number' => '17027902',
            'registered_office' => 'C/O Burton Varley Ltd, The Counting House, 24 Richmond Road, Bowdon, Altrincham, England, WA14 2TT',
            'ico' => 'ZC135852',
            'route' => 'construction',
            'logo' => 'assets/ignite-construction.svg',
            'accent' => '#f15a2b',
            'accent_rgb' => '241,90,43',
            'accent_text' => '#ffffff',
            'eyebrow' => 'Specialist construction recruitment',
            'title' => 'People who keep projects moving.',
            'lead' => 'We connect construction businesses with talent across the UK built environment — from professional appointments to site-based delivery and project workforce needs.',
            'image_label' => 'Built environment. Residential. Project delivery.',
            'intro_title' => 'Construction knowledge, practical delivery.',
            'intro' => 'Successful projects depend on the right people, at the right time, with the right experience. Our approach combines responsive search with clear checks, role information and site-readiness expectations.',
            'highlight' => 'From pre-construction planning to final handover.',
            'services' => [
                ['Built environment', 'Recruitment support for commercial developments, infrastructure, refurbishment, fit-out and mixed-use projects.'],
                ['Residential construction', 'Professional and site-based talent for high-rise, housebuilding and residential project delivery.'],
                ['Permanent & project hiring', 'Support for permanent appointments, temporary requirements and contract staffing around project demand.'],
            ],
            'markets' => ['Pre-construction & design', 'Commercial', 'Project & site management', 'Technical & operational', 'Skilled trades', 'Fit-out & refurbishment'],
            'market_intro' => 'Professional appointments and skilled project teams across the built environment.',
            'client_copy' => 'Whether you need one senior appointment or wider project support, we start with the programme, environment and non-negotiables — then build the search around delivery.',
            'candidate_copy' => 'We give candidates clear information about the role, site or project, expected experience and relevant checks before representation.',
            'compliance_title' => 'Procurement-ready compliance, visible from the start.',
            'compliance_copy' => 'Ignite Construction provides professionally managed construction recruitment and labour-supply services, supported by health & safety, candidate vetting, insurance, training, data protection and ESG controls. Our compliance route is designed to give clients and procurement teams a clear view of the standards behind our service.',
            'accreditations' => [
                ['SMAS Worksafe / SSIP', 'SSIP Approved. Certificate reference: 183806. Valid until 20 July 2027.'],
                ['CHAS Standard', 'SSIP Approved / Deem to Satisfy. Membership No. 181755. Certificate D2B70015-269C-401D-BD96-0E8772645DF1. Valid until 20 July 2027.'],
                ['Disability Confident', 'Disability Confident Committed Employer. Certificate DCS050626.'],
                ['Living Wage', 'Employer accreditation'],
                ['ICO', 'Data protection registration'],
                ['Insurance', 'Employers\' Liability, Public Liability & Professional Indemnity'],
                ['HS Direct', 'Health & safety support'],
            ],
            'extra_policy' => ['Construction Labour Supply Compliance', 'IG-POL-012_Construction_Labour_Supply_Compliance_Statement.pdf'],
        ],

        'engineering' => [
            'name' => 'Ignite Engineering',
            'short' => 'Engineering',
            'entity' => 'Ignite Engineering Talent Ltd',
            'company_number' => '16658593',
            'registered_office' => 'C/O Burton Varley Ltd, The Counting House, 24 Richmond Road, Bowdon, Altrincham, England, WA14 2TT.',
            'ico' => 'ZC135854',
            'route' => 'engineering',
            'logo' => 'assets/ignite-engineering.svg',
            'accent' => '#f6ad34',
            'accent_rgb' => '246,173,52',
            'accent_text' => '#171108',
            'eyebrow' => 'Specialist engineering recruitment',
            'title' => 'Technical talent, matched with rigour.',
            'lead' => 'We support engineering organisations with focused recruitment for technical, project and delivery-critical appointments.',
            'image_label' => 'Technical depth. Project focus. Clear assurance.',
            'intro_title' => 'The detail matters in engineering recruitment.',
            'intro' => 'A job title rarely tells the whole story. We look at discipline, environment, project phase, technical requirements and team fit so the search starts from a clearer brief.',
            'highlight' => 'Recruitment shaped around the technical brief — not just the title.',
            'services' => [
                ['Technical appointments', 'Focused search for engineering professionals where discipline knowledge and relevant experience matter.'],
                ['Project & contract support', 'Responsive recruitment around programme demand, project delivery and specialist requirements.'],
                ['Competence-led assurance', 'Proportionate attention to qualifications, role evidence and requirements for safety-sensitive environments.'],
            ],
            'markets' => ['Technical & design', 'Mechanical', 'Electrical & controls', 'Civil & structural', 'Project delivery', 'Quality & assurance'],
            'market_intro' => 'Focused searches across engineering disciplines and project environments.',
            'client_copy' => 'We translate the brief into a targeted search: technical scope, project context, must-have experience, working pattern and timescale all matter.',
            'candidate_copy' => 'Candidates receive clear role context and an honest conversation about technical fit, project expectations and the next step.',
            'compliance_title' => 'Assurance proportionate to the role.',
            'compliance_copy' => 'Our shared framework supports accurate representation, qualification checks where required and secure handling of technical and candidate information.',
        ],

        'tech' => [
            'name' => 'Ignite Tech',
            'short' => 'Tech',
            'entity' => 'Ignite Tech Talent Ltd',
            'company_number' => '16658531',
            'registered_office' => 'C/O Burton Varley Ltd, The Counting House, 24 Richmond Road, Bowdon, Altrincham, England, WA14 2TT',
            'ico' => 'ZC135860',
            'route' => 'tech',
            'logo' => 'assets/ignite-tech.svg',
            'accent' => '#3be47e',
            'accent_rgb' => '59,228,126',
            'accent_text' => '#0d1712',
            'eyebrow' => 'Specialist technology recruitment',
            'title' => 'Talent for teams building what’s next.',
            'lead' => 'We connect technology professionals with organisations hiring for delivery, change and growth — combining pace with careful information handling.',
            'image_label' => 'Technology recruitment with information care built in.',
            'intro_title' => 'Fast-moving markets need focused conversations.',
            'intro' => 'Technology hiring works best when the recruiter understands the outcome, the environment and the skills that genuinely matter. We turn that context into a more deliberate search.',
            'highlight' => 'Specialist search with privacy and confidentiality built in.',
            'services' => [
                ['Permanent technology hiring', 'Targeted search for long-term appointments across technical, product and delivery teams.'],
                ['Contract recruitment', 'Focused support for time-bound delivery, transformation and specialist project requirements.'],
                ['Confidential search', 'Careful handling of candidate, client and role information throughout sensitive appointments.'],
            ],
            'markets' => ['Software & engineering', 'Cloud & infrastructure', 'Data & analytics', 'Cyber security', 'Product & delivery', 'Support & operations'],
            'market_intro' => 'Technology recruitment built around the outcome your team needs to deliver.',
            'client_copy' => 'Tell us what the team is building, changing or fixing. We use that context to focus the search and communicate the opportunity with more precision.',
            'candidate_copy' => 'We keep role information, representation and data handling clear, so candidates can make informed decisions at every stage.',
            'compliance_title' => 'Information care is part of the service.',
            'compliance_copy' => 'Our approach gives data protection, information security, confidentiality and contractor clarity a visible place in the recruitment journey.',
        ],

        'legal' => [
            'name' => 'Ignite Legal',
            'short' => 'Legal',
            'entity' => 'Ignite Legal Ltd',
            'company_number' => '16658448',
            'registered_office' => 'C/O Burton Varley Ltd, The Counting House, 24 Richmond Road, Bowdon, Altrincham, England, WA14 2TT',
            'ico' => 'ZC135858',
            'route' => 'legal',
            'logo' => 'assets/ignite-legal.svg',
            'accent' => '#ff3c43',
            'accent_rgb' => '255,60,67',
            'accent_text' => '#ffffff',
            'eyebrow' => 'Specialist legal recruitment',
            'title' => 'Recruitment built on judgement and trust.',
            'lead' => 'We connect law firms, in-house teams and public-sector organisations with legal professionals at every level.',
            'image_label' => 'Discretion. Sector knowledge. Accurate representation.',
            'intro_title' => 'Legal recruitment calls for care and context.',
            'intro' => 'From sensitive searches to fast-moving team requirements, our work is grounded in confidentiality, accurate communication and a clear understanding of the appointment.',
            'highlight' => 'Permanent, interim and contract legal recruitment.',
            'services' => [
                ['Private practice', 'Specialist recruitment support for law firms seeking professionals across fee-earning and support functions.'],
                ['In-house & public sector', 'Focused search for corporate legal departments, public bodies and regulated environments.'],
                ['Interim & contract', 'Flexible recruitment for short-term capacity, specialist projects and changing team requirements.'],
            ],
            'markets' => ['Corporate & commercial', 'Litigation & disputes', 'Property & real estate', 'Employment law', 'Regulatory & compliance', 'Legal support & paralegal'],
            'market_intro' => 'Legal professionals from support level through to senior appointments.',
            'client_copy' => 'We clarify the team, mandate, level, working environment and sensitivity of the search before approaching the market.',
            'candidate_copy' => 'Discreet conversations, accurate representation and clear role information help candidates explore opportunities with confidence.',
            'compliance_title' => 'Confidentiality is a working standard.',
            'compliance_copy' => 'Our recruitment service is supported by group privacy, ethical recruitment and information-security controls. Ignite Legal provides recruitment services, not regulated legal advice.',
        ],

        'sales' => [
            'name' => 'Ignite Sales',
            'short' => 'Sales',
            'entity' => 'Ignite Sales Ltd',
            'company_number' => '16658561',
            'registered_office' => 'C/O Burton Varley Ltd, The Counting House, 24 Richmond Road, Bowdon, Altrincham, England, WA14 2TT',
            'ico' => 'ZC173466',
            'route' => 'sales',
            'logo' => 'assets/ignite-sales.svg',
            'accent' => '#4a40b8',
            'accent_rgb' => '74,64,184',
            'accent_text' => '#ffffff',
            'eyebrow' => 'Specialist sales recruitment',
            'title' => 'Revenue talent. Clear expectations.',
            'lead' => 'We help growth-minded organisations find sales professionals — and give candidates a clearer view of the role, expectations and opportunity.',
            'image_label' => 'Commercial energy with candidate clarity.',
            'intro_title' => 'Great sales hiring starts with a precise brief.',
            'intro' => 'Market, sales cycle, customer, target, leadership and reward all shape the right hire. We bring those details into the search from the beginning.',
            'highlight' => 'A sharper brief creates a stronger shortlist.',
            'services' => [
                ['Growth appointments', 'Targeted recruitment for organisations strengthening revenue, business development and commercial capability.'],
                ['Sales leadership', 'Focused search for leaders who can set direction, develop teams and build repeatable performance.'],
                ['Candidate clarity', 'Straightforward communication about fixed pay, variable reward, targets and OTE assumptions where supplied.'],
            ],
            'markets' => ['Business development', 'Account management', 'Sales leadership', 'Customer success', 'Commercial operations', 'Technology & B2B sales'],
            'market_intro' => 'Commercial appointments shaped around customer, proposition and growth stage.',
            'client_copy' => 'We build the search around the commercial reality: who buys, how they buy, what success looks like and what the role can genuinely offer.',
            'candidate_copy' => 'Clear conversations about remit, targets, earnings structure and progression help candidates judge the opportunity properly.',
            'compliance_title' => 'Clear role information builds trust.',
            'compliance_copy' => 'Our framework supports fair advertising, accurate representation and transparent communication around salary, commission and OTE.',
        ],

    ],

    // Per-sector contact headline (ported from the contact section ternary in app.js).
    'contact_headlines' => [
        'group' => 'Tell us what you need next.',
        'construction' => 'Tell us what your project needs.',
        'engineering' => 'Tell us what your engineering team needs.',
        'tech' => 'Tell us what your technology team is building.',
        'legal' => 'Tell us what legal talent you need.',
        'sales' => 'Tell us what your commercial team needs.',
    ],

];
