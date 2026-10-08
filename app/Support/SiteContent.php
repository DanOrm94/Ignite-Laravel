<?php

namespace App\Support;

use Illuminate\Support\Arr;

/**
 * Resolves Ignite site content from config/ignite.php and provides
 * the helpers the Blade templates need (sector lookup, policy links,
 * document path resolution). This replaces the client-side logic that
 * previously lived in app.js and documents-paths.js.
 */
class SiteContent
{
    /**
     * Return the full config array for a sector key, or null if unknown.
     *
     * @return array<string, mixed>|null
     */
    public static function site(string $key): ?array
    {
        return config("ignite.sites.$key");
    }

    /**
     * All sector keys in display order (excludes group).
     *
     * @return array<int, string>
     */
    public static function sectorOrder(): array
    {
        return config('ignite.sector_order', []);
    }

    /**
     * The sites keyed by their slug (group + sectors).
     *
     * @return array<string, array<string, mixed>>
     */
    public static function all(): array
    {
        return config('ignite.sites', []);
    }

    /**
     * Shared contact details.
     *
     * @return array<string, string>
     */
    public static function contact(): array
    {
        return config('ignite.contact', []);
    }

    /**
     * The policy links for a sector. Construction prepends its extra policy.
     *
     * @param  array<string, mixed>  $site
     * @return array<int, array{0: string, 1: string}>
     */
    public static function policyLinks(array $site): array
    {
        $links = config('ignite.policy_links', []);

        if (! empty($site['extra_policy'])) {
            array_unshift($links, $site['extra_policy']);
        }

        return $links;
    }

    /**
     * Hero image for a sector.
     *
     * @return array{src: string, alt: string}
     */
    public static function heroImage(string $key): array
    {
        return config("ignite.hero_images.$key", config('ignite.hero_images.group'));
    }

    /**
     * Per-sector contact section headline.
     */
    public static function contactHeadline(string $key): string
    {
        return config("ignite.contact_headlines.$key", config('ignite.contact_headlines.group'));
    }

    /**
     * Resolve a controlled-document filename to its public path, mirroring
     * the behaviour of the original documents-paths.js.
     */
    public static function documentPath(string $filename): string
    {
        $policyFiles = [
            'IG-POL-001_Health_and_Safety_Policy.pdf',
            'IG-POL-002_Modern_Slavery_and_Labour_Exploitation_Statement.pdf',
            'IG-POL-003_Data_Protection_Statement.pdf',
            'IG-POL-004_Right_to_Work_and_Candidate_Vetting_Policy.pdf',
            'IG-POL-005_Ethical_Recruitment_Policy.pdf',
            'IG-POL-006_Environmental_and_Sustainability_Policy.pdf',
            'IG-POL-007_Quality_Management_Policy.pdf',
            'IG-POL-008_Anti_Bribery_and_Corruption_Policy.pdf',
            'IG-POL-009_Complaints_Policy.pdf',
            'IG-POL-010_Supplier_Umbrella_and_Labour_Supply_Code_of_Conduct.pdf',
            'IG-POL-011_Training_and_Competence_Statement.pdf',
            'IG-POL-012_Construction_Labour_Supply_Compliance_Statement.pdf',
            'IG-POL-013_Information_Security_Policy.pdf',
            'IG-POL-014_Conflicts_of_Interest_Policy.pdf',
            'IG-POL-015_Whistleblowing_and_Speak_Up_Policy.pdf',
            'IG-POL-016_Equality_Diversity_and_Inclusion_Policy.pdf',
            'IG-WEB-001_Privacy_Notice.pdf',
            'IG-WEB-002_Cookie_Policy.pdf',
            'IG-WEB-003_Accessibility_Statement.pdf',
            'IG-WEB-004_Website_Terms_of_Use.pdf',
            'IG-WEB-005_Policies_and_Compliance_Hub_Page.pdf',
        ];

        $certificateFiles = [
            'Certificate_Standard_GB.pdf',
            'certificate-committed (1).pdf',
        ];

        if (in_array($filename, $policyFiles, true)) {
            return asset('documents/policies/'.$filename);
        }

        if (in_array($filename, $certificateFiles, true)) {
            return asset('documents/certificates/'.$filename);
        }

        return asset($filename);
    }
}
