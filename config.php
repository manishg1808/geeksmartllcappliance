<?php
/**
 * GeekSmart Appliance - Smart Appliance Repair & Tech Assistance
 * Global Configuration, Environment Helper & Service Registry
 */

require_once __DIR__ . '/includes/env.php';
load_env(__DIR__ . '/.env');

if (!env('APP_DEBUG', false)) {
    ini_set('display_errors', '0');
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}

// Site Base URL Detection
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

$projectDir = str_replace('\\', '/', realpath(dirname(__FILE__)));
$docRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? ''));

if (!empty($docRoot) && !empty($projectDir) && strpos($projectDir, $docRoot) === 0) {
    $webPath = substr($projectDir, strlen($docRoot));
} else {
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $webPath = preg_replace('#/(services|includes).*$#i', '', $scriptName);
    if (empty($webPath) || $webPath === '/') {
        $webPath = dirname($scriptName);
    }
}

$webPath = '/' . ltrim(str_replace('\\', '/', $webPath), '/');
$webPath = rtrim($webPath, '/');

$baseUrl = $protocol . "://" . $host . $webPath;
define('SITE_URL', $baseUrl);

// Business Details
define('SITE_NAME', 'GeekSmart Appliance');
define('SITE_TAGLINE', 'Reliable Appliance Repair & Tech Assistance – Fast, Onsite & Remote Support');
define('PHONE_NUMBER', '(808) 999-7791');
define('PHONE_RAW', '+18089997791');
define('EMAIL_ADDRESS', env('EMAIL_ADDRESS', 'support@geeksmartappliance.com'));
define('BUSINESS_ADDRESS', 'GeekSmart Tech & Appliance Hub, British Columbia, Canada');
define('BUSINESS_HOURS', 'Mon–Sat: 8:00 AM – 8:00 PM');
define('SERVICE_AREA', 'Appliance Repair & Tech Support Available Across BC & Surrounding Areas');
define('RATING_SCORE', '4.9');
define('RATING_COUNT', '1,680+');

// Database Configuration
define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_NAME', env('DB_NAME', 'geeksmartllcappli'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASS', env('DB_PASS', ''));

// Admin credentials (loaded from .env only)
define('ADMIN_USERNAME', env('ADMIN_USERNAME', ''));
define('ADMIN_PASSWORD', env('ADMIN_PASSWORD', ''));

// Global SEO Defaults
define('DEFAULT_META_TITLE', 'GeekSmart Appliance | Professional Appliance Repair & Tech Support');
define('DEFAULT_META_DESC', 'Fast, dependable repair for refrigerators, washing machines, dryers, ovens, dishwashers, printers, and smart tech by GeekSmart Appliance.');
define('DEFAULT_META_KEYWORDS', 'GeekSmart Appliance, appliance repair BC, refrigerator repair, washer dryer repair, printer setup, tech support');
define('DEFAULT_OG_IMAGE', SITE_URL . '/assets/images/1.webp');

// Services List
$servicesList = [
    'printer-service' => [
        'title' => 'Printer Installation & Network Repair',
        'category' => 'Printers & Tech',
        'icon' => 'printer',
        'short_desc' => 'Professional setup for wireless printers, paper jams, offline fixes & commercial copiers.',
        'full_desc' => 'Fast technician assistance and repair for laser printers, inkjet units, copiers, and label printers. We resolve WiFi offline status, IP configuration, printhead clogs, and driver conflicts.',
        'turnaround' => 'Fast Remote / Same-Day Onsite',
        'url' => '/printer-service.php',
        'common_issues' => [
            'Printer showing offline or disconnected status',
            'WiFi connectivity & network IP driver errors',
            'Faded, blurry or streaked printouts',
            'Paper jammed or tray feed sensor error',
            'Printhead clog & ink cartridge recognition error'
        ],
        'why_choose' => [
            ['icon' => 'wifi', 'title' => 'Network Printer Experts', 'desc' => 'We fix offline printers, IP conflicts, and driver spooler errors across HP, Canon, Epson, and Brother.'],
            ['icon' => 'monitor-smartphone', 'title' => 'Remote + Onsite Support', 'desc' => 'Many print queue and driver issues are resolved remotely; onsite visits for hardware jams and hardware faults.'],
            ['icon' => 'building-2', 'title' => 'Office & Home Ready', 'desc' => 'From single home inkjets to multi-function copiers and scan-to-email SMB setups.'],
        ],
        'related_slugs' => ['wifi-network-setup', 'smart-home-hub', 'commercial-appliance-repair'],
    ],
    'refrigerator-repair' => [
        'title' => 'Refrigerator & Freezer Repair',
        'category' => 'Kitchen Appliances',
        'icon' => 'snowflake',
        'short_desc' => 'Onsite & remote diagnostics for cooling failures, compressor codes, leaks & thermostats.',
        'full_desc' => 'Expert repair services for French door refrigerators, side-by-side models, freezers, and built-in units. We troubleshoot cooling issues, compressor relays, error codes, and ice maker leaks.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/refrigerator-repair.php',
        'common_issues' => [
            'Refrigerator failing to hold set cooling temperature',
            'Error code displayed on front control panel',
            'Ice buildup or frost on evaporator coils',
            'Clicking compressor relay noise',
            'Water dispenser or defrost sensor failure'
        ],
        'why_choose' => [
            ['icon' => 'thermometer-snowflake', 'title' => 'Cooling System Specialists', 'desc' => 'Compressor relays, defrost thermistors, and evaporator fan diagnostics for Samsung, LG, Whirlpool, and GE.'],
            ['icon' => 'package', 'title' => 'OEM Parts On Hand', 'desc' => 'Technicians carry common sensors, relays, and gaskets to restore cooling on the first visit.'],
            ['icon' => 'clock', 'title' => 'Same-Day Food Safety Priority', 'desc' => 'Rapid dispatch when temperature failures put food and inventory at risk.'],
        ],
        'related_slugs' => ['ice-maker-repair', 'dishwasher-repair', 'oven-repair'],
    ],
    'washer-repair' => [
        'title' => 'Washing Machine Repair',
        'category' => 'Laundry Appliances',
        'icon' => 'shirt',
        'short_desc' => 'Troubleshooting for front-load & top-load washers, drain pumps, spin cycles & error codes.',
        'full_desc' => 'Keep your laundry running smoothly. Our experienced specialists repair control panel error codes, non-spinning tubs, standing water pump clogs, and door switch latches.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/washer-repair.php',
        'common_issues' => [
            'Washer showing error code & refusing to spin',
            'Drain pump clogged or failing to discharge water',
            'Unusual vibration or tub out-of-balance warning',
            'Door lock switch sensor stuck',
            'Control board responsiveness issue'
        ],
        'why_choose' => [
            ['icon' => 'droplets', 'title' => 'Drain & Pump Diagnostics', 'desc' => 'We clear pump blockages, replace failed drain motors, and resolve OE / standing water codes.'],
            ['icon' => 'activity', 'title' => 'Spin & Balance Testing', 'desc' => 'Shock absorbers, tub bearings, and suspension systems tested to stop vibration and spin failures.'],
            ['icon' => 'shield-check', 'title' => 'Front & Top Load Coverage', 'desc' => 'Experienced with LG, Samsung, Whirlpool, Maytag, and Bosch laundry platforms.'],
        ],
        'related_slugs' => ['dryer-repair', 'commercial-appliance-repair', 'dishwasher-repair'],
    ],
    'dryer-repair' => [
        'title' => 'Clothes Dryer Repair',
        'category' => 'Laundry Appliances',
        'icon' => 'flame',
        'short_desc' => 'Diagnostics for electric & gas dryers, heating elements, thermal fuses & drum rollers.',
        'full_desc' => 'Fast troubleshooting for electric and gas clothes dryers. Testing and replacement of thermal fuses, moisture sensors, heating elements, power supply circuits, and drive belts.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/dryer-repair.php',
        'common_issues' => [
            'Dryer tumbling but no heat generated',
            'Digital error code stopping cycle mid-way',
            'Moisture sensor misreading dry clothes',
            'Thermal cut-off safety fuse triggered',
            'Control panel failing to start'
        ],
        'why_choose' => [
            ['icon' => 'flame', 'title' => 'Electric & Gas Heat Repair', 'desc' => 'Heating elements, igniters, gas valves, and thermal fuses tested and replaced safely.'],
            ['icon' => 'wind', 'title' => 'Vent & Airflow Checks', 'desc' => 'We inspect exhaust paths and moisture sensors that cause long dry times and overheating.'],
            ['icon' => 'badge-check', 'title' => 'Safety-First Service', 'desc' => 'Thermal cut-off and high-limit faults addressed to reduce fire risk and repeat failures.'],
        ],
        'related_slugs' => ['washer-repair', 'oven-repair', 'commercial-appliance-repair'],
    ],
    'oven-repair' => [
        'title' => 'Oven, Stove & Range Repair',
        'category' => 'Kitchen Appliances',
        'icon' => 'flame',
        'short_desc' => 'Diagnostics for range igniters, oven temperature calibration & control panels.',
        'full_desc' => 'Professional range & stove repair services. Guided testing and component replacement for gas igniter circuits, electric bake elements, thermostat calibration, and control boards.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/oven-repair.php',
        'common_issues' => [
            'Gas burner refusing to ignite or clicking',
            'Oven display showing F-code error',
            'Thermostat uncalibrated / uneven baking',
            'Door latch jammed on self-clean mode',
            'Control panel touch keys unresponsive'
        ],
        'why_choose' => [
            ['icon' => 'flame', 'title' => 'Gas & Electric Range Experts', 'desc' => 'Igniter circuits, bake/broil elements, and temperature calibration for even cooking results.'],
            ['icon' => 'gauge', 'title' => 'Error Code Decoding', 'desc' => 'F-code and fault diagnostics across GE, Whirlpool, Samsung, and KitchenAid control boards.'],
            ['icon' => 'lock', 'title' => 'Safe Self-Clean Support', 'desc' => 'Door latch, lock motor, and thermal switch repairs after self-clean cycle faults.'],
        ],
        'related_slugs' => ['cooktop-repair', 'microwave-repair', 'dishwasher-repair'],
    ],
    'dishwasher-repair' => [
        'title' => 'Dishwasher Repair & Servicing',
        'category' => 'Kitchen Appliances',
        'icon' => 'droplet',
        'short_desc' => 'Repairing standing water, spray arm pressure, door seals & wash pump motors.',
        'full_desc' => 'Get your dishwasher functioning properly without hassle. Onsite service to resolve standing water, drain filter blockage, wash pump errors, leaking door gaskets, and cycle resets.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/dishwasher-repair.php',
        'common_issues' => [
            'Dishes coming out dirty or soapy residue',
            'Water standing at bottom of tub with error code',
            'Dishwasher humming but not starting cycle',
            'Drain pump pressure sensor error',
            'Door latch sensor misreading closed door'
        ],
        'why_choose' => [
            ['icon' => 'droplet', 'title' => 'Wash & Drain System Repair', 'desc' => 'Spray arms, wash pumps, and drain paths restored for clean cycles without standing water.'],
            ['icon' => 'filter', 'title' => 'Leak & Seal Solutions', 'desc' => 'Door gaskets, inlet valves, and float switches checked to stop leaks and fill errors.'],
            ['icon' => 'sparkles', 'title' => 'Kitchen Workflow Restored', 'desc' => 'Fast turnaround so your daily dish routine is back on track the same day.'],
        ],
        'related_slugs' => ['refrigerator-repair', 'garbage-disposal', 'oven-repair'],
    ],
    'cooktop-repair' => [
        'title' => 'Cooktop & Range Hood Repair',
        'category' => 'Kitchen Appliances',
        'icon' => 'sliders',
        'short_desc' => 'Diagnostics for induction glass tops, gas stove igniters & exhaust ventilation hoods.',
        'full_desc' => 'Specialized repair for induction glass cooktops, radiant electric elements, gas stove spark igniters, and range hood ventilation controls.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/cooktop-repair.php',
        'common_issues' => [
            'Induction top flashing E-code error',
            'Glass cooktop element touch lock active',
            'Range hood fan speed control failure',
            'Spark igniter clicking continuously'
        ],
        'why_choose' => [
            ['icon' => 'sliders', 'title' => 'Induction & Gas Cooktop Repair', 'desc' => 'Glass-top elements, induction coils, and spark igniters diagnosed without damaging surfaces.'],
            ['icon' => 'fan', 'title' => 'Range Hood Ventilation', 'desc' => 'Fan motors, switches, and duct airflow issues resolved for proper kitchen ventilation.'],
            ['icon' => 'zap', 'title' => 'Touch Control Diagnostics', 'desc' => 'Unresponsive keys and lock-out modes cleared on modern digital cooktops.'],
        ],
        'related_slugs' => ['oven-repair', 'microwave-repair', 'dishwasher-repair'],
    ],
    'ice-maker-repair' => [
        'title' => 'Ice Maker & Wine Cooler Repair',
        'category' => 'Kitchen Appliances',
        'icon' => 'snowflake',
        'short_desc' => 'Support for ice maker fill valves, sensors, line clogs & wine cellar cooling.',
        'full_desc' => 'Keep your beverages cold. Troubleshooting for ice maker fill valves, sensor arm switches, digital control boards, water filters, and wine cooler thermostats.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/ice-maker-repair.php',
        'common_issues' => [
            'Ice maker stopped producing ice',
            'Ice dispenser motor sensor failure',
            'Water filter indicator reset & line flush',
            'Wine cooler failing to hold set temperature'
        ],
        'why_choose' => [
            ['icon' => 'snowflake', 'title' => 'Ice Production Restoration', 'desc' => 'Fill valves, inlet lines, and sensor arms repaired for steady ice output.'],
            ['icon' => 'wine', 'title' => 'Wine Cooler Temperature Control', 'desc' => 'Thermostats and fans calibrated so beverage storage stays at the correct set point.'],
            ['icon' => 'filter', 'title' => 'Water Line & Filter Service', 'desc' => 'Clogged lines flushed and filters replaced to protect ice quality and flow.'],
        ],
        'related_slugs' => ['refrigerator-repair', 'dishwasher-repair', 'commercial-refrigeration'],
    ],
    'commercial-appliance-repair' => [
        'title' => 'Commercial Appliance Support',
        'category' => 'Commercial',
        'icon' => 'store',
        'short_desc' => 'Repair services for restaurant fryers, walk-in coolers, commercial washers & ovens.',
        'full_desc' => 'Minimize business downtime with commercial equipment repair. Rapid service for commercial reach-in freezers, laundromat washers, conveyor ovens, and office equipment.',
        'turnaround' => 'Priority Same-Day Dispatch',
        'url' => '/services/commercial-appliance-repair.php',
        'common_issues' => [
            'Commercial reach-in cooler temperature alert',
            'Commercial washer drain solenoid failure',
            'High-capacity ice machine freeze cycle fault',
            'Conveyor oven temperature sensor fault'
        ],
        'why_choose' => [
            ['icon' => 'store', 'title' => 'Business Downtime Focus', 'desc' => 'Priority routing for restaurants, laundromats, and offices when equipment failure stops operations.'],
            ['icon' => 'truck', 'title' => 'Commercial-Grade Parts', 'desc' => 'Heavy-duty components sourced for high-use washers, ovens, and reach-in units.'],
            ['icon' => 'clock', 'title' => 'Priority Same-Day Dispatch', 'desc' => 'Expedited scheduling to get revenue-generating equipment back online fast.'],
        ],
        'related_slugs' => ['commercial-refrigeration', 'commercial-kitchen', 'washer-repair'],
    ],
    'microwave-repair' => [
        'title' => 'Microwave & Wall Oven Repair',
        'category' => 'Kitchen Appliances',
        'icon' => 'zap',
        'short_desc' => 'Diagnostics for countertop & built-in microwaves, magnetron tubes, door switches & touchpads.',
        'full_desc' => 'Fast repairs for countertop, over-the-range, and built-in wall ovens. We replace magnetron tubes, door safety switches, high-voltage diodes, and touch keypads.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/microwave-repair.php',
        'common_issues' => [
            'Microwave running but not heating food',
            'Turntable plate not spinning properly',
            'Sparking or arcing inside microwave cavity',
            'Touchpad buttons unresponsive'
        ],
        'why_choose' => [
            ['icon' => 'zap', 'title' => 'High-Voltage Component Repair', 'desc' => 'Magnetron, diode, and capacitor faults diagnosed safely by trained technicians.'],
            ['icon' => 'shield', 'title' => 'Door Switch Safety Checks', 'desc' => 'Interlock switches tested to prevent arcing and ensure safe operation.'],
            ['icon' => 'layout-panel-top', 'title' => 'Built-In & OTR Models', 'desc' => 'Countertop, over-the-range, and wall-oven combo units supported.'],
        ],
        'related_slugs' => ['oven-repair', 'cooktop-repair', 'dishwasher-repair'],
    ],
    'garbage-disposal' => [
        'title' => 'Garbage Disposal Repair & Install',
        'category' => 'Kitchen Appliances',
        'icon' => 'settings',
        'short_desc' => 'Unjamming disposal blades, reset button trips, motor replacement & sink leaks.',
        'full_desc' => 'Professional sink garbage disposal service. We clear flywheel jams, fix under-sink leaks, replace worn impellers, and install high-torque replacement disposals.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/garbage-disposal.php',
        'common_issues' => [
            'Disposal humming but blade stuck solid',
            'Water leaking underneath sink disposal unit',
            'Reset button tripping continuously',
            'Unusual grinding or metallic rattling sound'
        ],
        'why_choose' => [
            ['icon' => 'settings', 'title' => 'Jam Clear & Motor Repair', 'desc' => 'Flywheel jams cleared and worn motors replaced without damaging plumbing connections.'],
            ['icon' => 'droplet', 'title' => 'Leak-Proof Installations', 'desc' => 'Sink flange, dishwasher knock-out, and drain line seals checked to stop under-sink leaks.'],
            ['icon' => 'hammer', 'title' => 'Replacement Upgrades', 'desc' => 'High-torque disposal units installed with proper electrical and plumbing hookups.'],
        ],
        'related_slugs' => ['dishwasher-repair', 'trash-compactor', 'cooktop-repair'],
    ],
    'trash-compactor' => [
        'title' => 'Trash Compactor Service',
        'category' => 'Kitchen Appliances',
        'icon' => 'box',
        'short_desc' => 'Diagnostics for ram drive gears, direction switches, key locks & motor belts.',
        'full_desc' => 'Expert maintenance for built-in kitchen trash compactors. Replacing drive gears, directional limit switches, drive belts, and key lock switches.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/trash-compactor.php',
        'common_issues' => [
            'Compactor ram stuck in down position',
            'Motor running but ram not moving',
            'Drawer failing to open or latch shut'
        ],
        'why_choose' => [
            ['icon' => 'cog', 'title' => 'Drive Gear & Belt Repair', 'desc' => 'Ram drive assemblies, belts, and directional switches restored for smooth compaction cycles.'],
            ['icon' => 'key', 'title' => 'Key Lock & Safety Switches', 'desc' => 'Drawer latches and key interlocks repaired so the unit operates safely and reliably.'],
            ['icon' => 'box', 'title' => 'Built-In Kitchen Specialists', 'desc' => 'Experience with integrated compactor models common in modern kitchen layouts.'],
        ],
        'related_slugs' => ['garbage-disposal', 'dishwasher-repair', 'refrigerator-repair'],
    ],
    'commercial-refrigeration' => [
        'title' => 'Commercial Refrigeration & Coolers',
        'category' => 'Commercial',
        'icon' => 'snowflake',
        'short_desc' => 'Priority dispatch for restaurant walk-in freezers, display cases & glass door chillers.',
        'full_desc' => '24/7 priority emergency service for commercial refrigeration, walk-in coolers, glass door display chillers, and under-counter beverage centers.',
        'turnaround' => 'Priority Emergency Dispatch',
        'url' => '/services/commercial-refrigeration.php',
        'common_issues' => [
            'Walk-in freezer temperature rising above threshold',
            'Evaporator fan motor failure or ice build-up',
            'Refrigerant gas leak diagnostic',
            'Commercial door gasket replacement'
        ],
        'why_choose' => [
            ['icon' => 'snowflake', 'title' => 'Walk-In & Display Case Experts', 'desc' => 'Emergency response for walk-in coolers, glass-door merchandisers, and under-counter chillers.'],
            ['icon' => 'thermometer', 'title' => 'Temperature Compliance Support', 'desc' => 'Rapid recovery when storage temps drift outside safe food-service thresholds.'],
            ['icon' => 'siren', 'title' => '24/7 Priority Dispatch', 'desc' => 'After-hours routing available for critical refrigeration failures.'],
        ],
        'related_slugs' => ['commercial-kitchen', 'commercial-appliance-repair', 'ice-maker-repair'],
    ],
    'commercial-kitchen' => [
        'title' => 'Commercial Kitchen Equipment',
        'category' => 'Commercial',
        'icon' => 'utensils',
        'short_desc' => 'Repair services for commercial dishwashers, deep fryers, steam tables & ranges.',
        'full_desc' => 'Keep your commercial kitchen compliant and operating smoothly. Repair services for commercial high-temp dishwashers, deep fryers, salamanders, and steam tables.',
        'turnaround' => 'Priority Emergency Dispatch',
        'url' => '/services/commercial-kitchen.php',
        'common_issues' => [
            'Commercial dishwasher chemical pump failure',
            'Deep fryer thermostat safety shut-off',
            'Commercial range burner pilot ignition error'
        ],
        'why_choose' => [
            ['icon' => 'utensils', 'title' => 'Restaurant Equipment Focus', 'desc' => 'High-temp dishwashers, fryers, salamanders, and steam tables repaired for kitchen uptime.'],
            ['icon' => 'clipboard-check', 'title' => 'Health Code Awareness', 'desc' => 'Repairs prioritized to restore safe cooking, washing, and holding temperatures quickly.'],
            ['icon' => 'users', 'title' => 'Multi-Unit Support', 'desc' => 'Service plans friendly for cafés, catering kitchens, and multi-location food businesses.'],
        ],
        'related_slugs' => ['commercial-refrigeration', 'commercial-appliance-repair', 'oven-repair'],
    ],
    'smart-home-hub' => [
        'title' => 'Smart Home Hub & Appliance Pairing',
        'category' => 'Smart Home & TV',
        'icon' => 'cpu',
        'short_desc' => 'Configuration for smart fridge displays, Alexa/Google Home voice pairing & Wi-Fi modules.',
        'full_desc' => 'Integrate your smart appliances into your home automation system. We pair smart refrigerators, washers, ovens, and voice hubs to your home network.',
        'turnaround' => 'Same-Day Technical Support',
        'url' => '/services/smart-home-hub.php',
        'common_issues' => [
            'Smart fridge display failing to connect to Wi-Fi',
            'Appliance app showing offline status',
            'Voice assistant command pairing failure'
        ],
        'why_choose' => [
            ['icon' => 'cpu', 'title' => 'Appliance App Pairing', 'desc' => 'Smart fridges, washers, and ovens connected to home networks and manufacturer apps.'],
            ['icon' => 'mic', 'title' => 'Voice Assistant Setup', 'desc' => 'Alexa and Google Home routines configured for appliance control and alerts.'],
            ['icon' => 'wifi', 'title' => 'Stable Smart Connectivity', 'desc' => 'Wi-Fi modules and hub placement optimized to stop frequent offline errors.'],
        ],
        'related_slugs' => ['wifi-network-setup', 'tv-wall-mount', 'refrigerator-repair'],
    ],
    'tv-wall-mount' => [
        'title' => 'TV Wall Mounting & Cable Setup',
        'category' => 'Smart Home & TV',
        'icon' => 'tv',
        'short_desc' => 'Precision TV mounting on drywall, brick & stud walls with hidden wire routing.',
        'full_desc' => 'Professional installation for OLED, QLED, and LED TVs from 32" to 85"+. Includes heavy-duty mount anchoring, soundbar mounting, and cable concealment.',
        'turnaround' => 'Same-Day Onsite Service',
        'url' => '/services/tv-wall-mount.php',
        'common_issues' => [
            'TV wall mount bracket alignment & stud anchoring',
            'In-wall cable concealment & outlet routing',
            'Soundbar & AV receiver HDMI ARC configuration'
        ],
        'why_choose' => [
            ['icon' => 'ruler', 'title' => 'Precision Mounting', 'desc' => 'Stud-finder anchoring and level alignment for TVs from 32" to 85"+ on any wall type.'],
            ['icon' => 'cable', 'title' => 'Hidden Wire Routing', 'desc' => 'Clean in-wall or surface-channel cable runs for a professional finished look.'],
            ['icon' => 'speaker', 'title' => 'Soundbar & HDMI Setup', 'desc' => 'ARC/eARC and receiver connections configured for reliable audio and video sync.'],
        ],
        'related_slugs' => ['smart-home-hub', 'wifi-network-setup', 'printer-service'],
    ],
    'wifi-network-setup' => [
        'title' => 'Office Wi-Fi & Network Setup',
        'category' => 'Printers & Tech',
        'icon' => 'wifi',
        'short_desc' => 'Mesh Wi-Fi installation, router placement, IP configuration & printer sharing.',
        'full_desc' => 'Eliminate Wi-Fi dead zones in your home or office. We install mesh networks, configure static IP addresses for office printers, and optimize network security.',
        'turnaround' => 'Fast Remote / Same-Day Onsite',
        'url' => '/services/wifi-network-setup.php',
        'common_issues' => [
            'Wi-Fi coverage dead spots in office or home',
            'Network printer IP conflict causing disconnects',
            'Router firewall blocking local device sharing'
        ],
        'why_choose' => [
            ['icon' => 'wifi', 'title' => 'Dead Zone Elimination', 'desc' => 'Mesh systems and access point placement tuned for full-home or office coverage.'],
            ['icon' => 'network', 'title' => 'Printer & Device IP Setup', 'desc' => 'Static reservations and VLAN-friendly configs stop recurring offline conflicts.'],
            ['icon' => 'shield', 'title' => 'Secure Network Hardening', 'desc' => 'Firewall, guest network, and sharing rules set up without blocking business devices.'],
        ],
        'related_slugs' => ['printer-service', 'smart-home-hub', 'tv-wall-mount'],
    ]
];

/**
 * Output <option> tags for service dropdowns (includes "Other").
 */
function service_select_options(string $placeholder = 'Select service', bool $withCategory = false): void
{
    global $servicesList;

    if ($placeholder !== '') {
        echo '<option value="">' . htmlspecialchars($placeholder) . '</option>';
    }

    foreach ($servicesList as $svc) {
        $title = htmlspecialchars($svc['title']);
        $label = $withCategory
            ? $title . ' (' . htmlspecialchars($svc['category']) . ')'
            : $title;
        echo '<option value="' . $title . '">' . $label . '</option>';
    }

    echo '<option value="Other">Other</option>';
}
