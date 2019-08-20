<?php

namespace Sau\WP\Plugin\Core\Carbon;

use Carbon_Fields\Field;
use Sau\WP\Core\Carbon\Container;
use Sau\WP\Core\Carbon\ContainerType;

class ThemeOptions extends Container
{

    /**
     * @return string
     * @see ContainerType for get types
     */
    public function getType(): string
    {
        return ContainerType::THEME_OPTIONS;
    }

    public function getTitle(): string
    {
        return 'options';
    }

    /**
     * Return fields array
     * @return array
     */
    public function getFields(): array
    {
        return [
            Field::make('text', 'test', __('Text'))
                 ->set_help_text($var = __('Text'))
                 ->set_default_value($var),
        ];
    }
}
