<?php
namespace OMedia\OAuth2Framework\Endpoint;

/**
 * RFC6749 Token endpoint interface.
 *
 * The token endpoint is used by the client to obtain an access token by
 * presenting its authorization grant or refresh token. The token
 * endpoint is used with every authorization grant except for the
 * implicit grant type (since an access token is issued directly).
 *
 * @see http://tools.ietf.org/html/rfc6749#section-3.2
 * @author Alexander Sergeychik
 */
interface TokenEndpointInterface extends EndpointInterface {
}
