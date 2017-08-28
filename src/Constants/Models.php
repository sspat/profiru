<?php
namespace sspat\ProfiRu\Constants;

class Models
{
    /** Organization models */

    /** @var string         API model for associations */
    const ASSOCIATION = 'provider.association';

    /** @var string         API model for association structure units */
    const ASSOCIATION_STRUCTURE_UNIT = 'provider.association.structure-unit';

    /** @var string         API model for association structure units */
    const ASSOCIATION_ORGANIZATION_UNIT = 'provider.association.organization-unit';

    /** @var string         API model for association structure units */
    const ASSOCIATION_BRANCH = 'provider.association.branch';

    /** Specialist models */

    /** @var string         API model for specialists */
    const SPECIALIST = 'provider.specialist';

    /** @return string[]    Models currently supported for organizations by this library */
    public static function getSupportedOrganizationModels()
    {
        return [
            self::ASSOCIATION,
            self::ASSOCIATION_STRUCTURE_UNIT,
            self::ASSOCIATION_ORGANIZATION_UNIT,
            self::ASSOCIATION_BRANCH
        ];
    }

    /** @return string[]    Models currently supported for specialists by this library */
    public static function getSupportedSpecialistModels()
    {
        return [
            self::SPECIALIST
        ];
    }
}
