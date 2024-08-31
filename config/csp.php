<?php
/**
 * CSP (Content Security Policy)
 *
 * fell free to add your custom CSP.
 *
 * original code by 2022 Hendro Wicaksono (hendrowicaksono@yahoo.com)
 * modified by Drajat Hasan (drajathasan20@gmail.com)
 */
return [
    "base-uri 'self'",
    "script-src 'self' 'unsafe-inline' 'unsafe-eval' *.google.com *.gstatic.com *.tawk.to cdn.jsdelivr.net",
    "style-src 'self' 'unsafe-inline' *.bootstrapcdn.com *.googleapis.com *.tawk.to",
    "img-src 'self' static.slims.web.id data: *.tawk.to cdn.jsdelivr.net tawk.link s3.amazonaws.com",
    "connect-src 'self' slims.web.id *.tawk.to wss://*.tawk.to",
    "frame-src 'self' *.google.com *.tawk.to",
    "font-src 'self' *.gstatic.com *.tawk.to",
    "media-src 'self' *.tawk.to",
    "object-src 'self'",
    "manifest-src 'self'",
    "worker-src 'self'",
    "frame-ancestors 'self'",
    "form-action 'self' *.tawk.to"
];