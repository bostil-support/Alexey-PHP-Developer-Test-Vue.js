export default function (
  parseNumbers = true, parseBool = true, ignoreNull = true,
  ignoreEmptyString = true) {
  return function decoder (str, decoder, charset) {
    const strWithoutPlus = str.replace(/\+/g, ' ')
    if (charset === 'iso-8859-1') {
      // unescape never throws, no try...catch needed:
      return strWithoutPlus.replace(/%[0-9a-f]{2}/gi, unescape)
    }

    if (parseNumbers && /^(\d+|\d*\.\d+)$/.test(str)) {
      return parseFloat(str)
    }

    if (ignoreEmptyString && str.length === 0) {
      return
    }

    const keywords = {
      null: ignoreNull ? undefined : null,
      undefined,
    }

    if (str in keywords) {
      return keywords[str]
    }

    const boolKeywords = {
      true: true,
      false: false,
    }

    if (parseBool && str in boolKeywords) {
      return boolKeywords[str]
    }

    try {
      return decodeURIComponent(strWithoutPlus)
    } catch (e) {
      return strWithoutPlus
    }
  }
}
