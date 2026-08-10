<?php
/**
 * GeekSmart Appliance - Comprehensive JSON-LD Structured Data Schema for SEO
 */
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/../config.php';
}
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "LocalBusiness",
      "@id": "<?php echo SITE_URL; ?>/#organization",
      "name": "<?php echo SITE_NAME; ?>",
      "url": "<?php echo SITE_URL; ?>",
      "telephone": "<?php echo PHONE_RAW; ?>",
      "email": "<?php echo EMAIL_ADDRESS; ?>",
      "priceRange": "$$",
      "image": "<?php echo DEFAULT_OG_IMAGE; ?>",
      "description": "<?php echo DEFAULT_META_DESC; ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "GeekSmart Tech & Appliance Hub",
        "addressLocality": "Vancouver",
        "addressRegion": "BC",
        "addressCountry": "CA"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "49.2827",
        "longitude": "-123.1207"
      },
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          "opens": "08:00",
          "closes": "20:00"
        }
      ],
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "<?php echo RATING_SCORE; ?>",
        "reviewCount": "1680"
      }
    },
    {
      "@type": "Service",
      "serviceType": "Appliance Repair & Tech Support",
      "provider": {
        "@id": "<?php echo SITE_URL; ?>/#organization"
      },
      "areaServed": [
        "Vancouver, BC",
        "Surrey, BC",
        "Victoria, BC",
        "Burnaby, BC",
        "Richmond, BC",
        "Kelowna, BC",
        "Abbotsford, BC",
        "Coquitlam, BC"
      ],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Appliance Repair & Tech Support Catalog",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Refrigerator & Freezer Repair"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Washing Machine Repair"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Printer Setup & Copier Repair"
            }
          }
        ]
      }
    }
  ]
}
</script>
