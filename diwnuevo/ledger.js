
function serializeLedger(ledger) {
  return JSON.stringify(ledger);
}

function loadLedger(json) {
  return JSON.parse(json);
}

function checkoutDevice(ledger, assetTag, borrower) {
  const ledgerCopy = loadLedger(serializeLedger(ledger));

  if (!ledgerCopy.hasOwnProperty(assetTag)) {
    return {
      ledger: ledgerCopy,
      message: `Asset ${assetTag} was not found.`
    };
  }

  if (ledgerCopy[assetTag].status === "CheckedOut") {
    return {
      ledger: ledgerCopy,
      message: `Asset ${assetTag} is already checked out.`
    };
  }

  ledgerCopy[assetTag].borrower.name = borrower.name;
  ledgerCopy[assetTag].borrower.email = borrower.email;
  ledgerCopy[assetTag].status = "CheckedOut";

  return {
    ledger: ledgerCopy,
    message: `Asset ${assetTag} checked out to ${borrower.name}.`
  };
}

function checkinDevice(ledger, assetTag) {
  const ledgerCopy = loadLedger(serializeLedger(ledger));

  if (!ledgerCopy.hasOwnProperty(assetTag)) {
    return {
      ledger: ledgerCopy,
      message: `Asset ${assetTag} was not found.`
    };
  }

  ledgerCopy[assetTag].borrower.name = "";
  ledgerCopy[assetTag].borrower.email = "";
  ledgerCopy[assetTag].dueDate = "";
  ledgerCopy[assetTag].status = "CheckedIn";

  return {
    ledger: ledgerCopy,
    message: `Asset ${assetTag} successfully checked in.`
  };
}

function listOverdueDevices(ledger, today) {
  function convertDate(date) {
    const [month, day, year] = date.split("/");
    return Number(year) * 10000 +
      Number(month) * 100 +
      Number(day);
  }

  const todayNumber = convertDate(today);

  return Object.values(ledger)
    .filter(device =>
      device.status === "CheckedOut" &&
      convertDate(device.dueDate) < todayNumber
    )
    .sort((a, b) =>
      convertDate(a.dueDate) - convertDate(b.dueDate)
    );
}
