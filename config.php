<?php
/**
 * GeekSmart Appliance - Smart Appliance Repair & Tech Assistance
 * Global Configuration, Environment Helper & Service Registry
 */

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
define('EMAIL_ADDRESS', 'support@geeksmartllcappliance.com');
define('NOTIFICATION_EMAIL', 'mayank10153@gmail.com');
define('BUSINESS_ADDRESS', 'GeekSmart Tech & Appliance Hub, British Columbia, Canada');
define('BUSINESS_HOURS', 'Mon–Sat: 8:00 AM – 8:00 PM');
define('SERVICE_AREA', 'Appliance Repair & Tech Support Available Across BC & Surrounding Areas');
define('RATING_SCORE', '4.9');
define('RATING_COUNT', '1,680+');

// Database Configuration (XAMPP MySQL defaults)
define('DB_HOST', 'localhost');
define('DB_NAME', 'geeksmartllcappli');
define('DB_USER', 'root');
define('DB_PASS', '');

// Gmail SMTP Mail Configuration
define('SMTP_ENABLED', true);
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'mayank10153@gmail.com');
define('SMTP_PASSWORD', 'ukne gqru woyy bvaz');
define('SMTP_ENCRYPTION', 'tls');

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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
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
        ]
    ]
];
