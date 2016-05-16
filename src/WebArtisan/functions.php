<?php

if (!function_exists('is_active_menu')) {
    /**
     * @param $parameter
     * @param $value
     *
     * @return bool
     */
    function is_active_menu($parameter, $value)
    {
        /** @var \Illuminate\Http\Request $request */
        $request = app()['request'];
        $routeParameter = $request->route()->getParameter($parameter);

        return $routeParameter == $value;
    }
}
