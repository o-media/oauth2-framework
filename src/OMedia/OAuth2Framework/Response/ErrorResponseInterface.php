<?php
namespace Like2biz\Bundle\GoogleBundle\OAuth2\Response;

/**
 * RFC6749 OAuth2 error response interface 
 * @see http://tools.ietf.org/html/rfc6749#section-4.1.2.1
 * 
 * @author Alexander Sergeychik
 */
interface ErrorResponseInterface {

	const ERROR_INVALID_REQUEST = 'invalid_request';
	const ERROR_UNAUTHORIZED_CLIENT = 'unauthorized_client';
	const ERROR_ACCESS_DENIED = 'access_denied';
	const ERROR_UNSUPPORTED_RESPONSE_TYPE = 'unsupported_response_type';
	const ERROR_INVALID_SCOPE = 'invalid_scope';
	const ERROR_SERVER_ERROR = 'server_error';
	const ERROR_TEMPORARILY_UNAVAILABLE = 'temporarily_unavailable';

	const PARAMETER_ERROR = 'error';
	const PARAMETER_ERROR_DESCRIPTION = 'error_description';
	const PARAMETER_ERROR_URI = 'error_uri';
	const PARAMETER_STATE = 'state';
	
	/**
	 * A single ASCII [USASCII] error code from from the
	 * following:
	 *
	 * - invalid_request
	 * The request is missing a required parameter, includes an
	 * invalid parameter value, includes a parameter more than
	 * once, or is otherwise malformed.
	 *
	 * - unauthorized_client
	 * The client is not authorized to request an authorization
	 * code using this method.
	 *
	 * - access_denied
	 * The resource owner or authorization server denied the
	 * request.
	 *
	 * - unsupported_response_type
	 * The authorization server does not support obtaining an
	 * authorization code using this method.
	 *
	 * - invalid_scope
	 * The requested scope is invalid, unknown, or malformed.
	 *
	 * - server_error
	 * The authorization server encountered an unexpected
	 * condition that prevented it from fulfilling the request.
	 * (This error code is needed because a 500 Internal Server
	 * Error HTTP status code cannot be returned to the client
	 * via an HTTP redirect.)
	 *
	 * - temporarily_unavailable
	 * The authorization server is currently unable to handle
	 * the request due to a temporary overloading or maintenance
	 * of the server. (This error code is needed because a 503
	 * Service Unavailable HTTP status code cannot be returned
	 * to the client via an HTTP redirect.)
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.2.1
	 * @return string - one of error constants ERROR_*
	 */
	public function getError();

	/**
	 * Human-readable ASCII [USASCII] text providing additional information,
	 * used to assist the client developer in understanding the error that
	 * occurred.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.2.1
	 * @return string
	 */
	public function getErrorDescription();

	/**
	 * A URI identifying a human-readable web page with
	 * information about the error, used to provide the client
	 * developer with additional information about the error.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.2.1
	 * @return string|null
	 */
	public function getErrorUri();

	/**
	 * if a "state" parameter was present in the client authorization request.
	 * The exact value received from the client.
	 *
	 * @see http://tools.ietf.org/html/rfc6749#section-4.1.2.1
	 * @return string|null
	 */
	public function getState();

}
