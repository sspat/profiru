<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Constants;

final class Models
{
    /** Organization models */

    /** API model for associations */
    public const ASSOCIATION = 'provider.association';

    /** API model for association structure units */
    public const ASSOCIATION_STRUCTURE_UNIT = 'provider.association.structure-unit';

    /** API model for association structure units */
    public const ASSOCIATION_ORGANIZATION_UNIT = 'provider.association.organization-unit';

    /** API model for association structure units */
    public const ASSOCIATION_BRANCH = 'provider.association.branch';

    /** Specialist models */

    /** API model for specialists */
    public const SPECIALIST = 'provider.specialist';

    /** @return string[] Models currently supported for organizations by this library */
    public static function getSupportedOrganizationModels() : array
    {
        return [
            self::ASSOCIATION,
            self::ASSOCIATION_STRUCTURE_UNIT,
            self::ASSOCIATION_ORGANIZATION_UNIT,
            self::ASSOCIATION_BRANCH,
        ];
    }

    /** @return string[] Models currently supported for specialists by this library */
    public static function getSupportedSpecialistModels() : array
    {
        return [
            self::SPECIALIST,
        ];
    }
}
