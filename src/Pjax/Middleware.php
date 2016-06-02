<?php

namespace Elektra\Pjax;

use Closure;

class Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Closure                  $next
     *
     * @return mixed
     */
    public function handel($request, Closure $next)
    {
        if (!$request->pjax()) {
            return $next($request);
        }
        // First we get the request fragment, then we compile it to view cache
        // next time we can request the cached view instead of manipulate complex
        // string from response.

        // 覆写 view factory
        // 检查是否有已存的模版
        // 检查是否过期
        // （编译模版
        // 取出一种的代码段另存）-》 如果不能直接取代码段-》 crawler dom 或 pjax
        // 执行并返回
        return $next($request);
    }
}
